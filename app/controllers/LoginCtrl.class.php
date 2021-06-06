<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;
use core\SessionUtils;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\loginForm;
use app\forms\RegisterForm;


class LoginCtrl {

  private $formlogin;
  private $formregister;
  private $logindb;
  private $role;

  public function __construct(){

    $this->formlogin = new LoginForm();
    $this->formregister = new RegisterForm();

  }

  //FORMULARZ REJESTRACJI

  public function validateSaveRegister() {
        
      //Pobieram parametry z formularza rejestracji


        $this->formregister->login = ParamUtils::getFromRequest('login', true, 'Błędne wywołanie aplikacji1');
        $this->formregister->password = ParamUtils::getFromRequest('password', true, 'Błędne wywołanie aplikacji2');
        $this->formregister->imie = ParamUtils::getFromRequest('imie', true, 'Błędne wywołanie aplikacji3');
        $this->formregister->nazwisko = ParamUtils::getFromRequest('nazwisko', true, 'Błędne wywołanie aplikacji4');
        $this->formregister->telefon = ParamUtils::getFromRequest('telefon', true, 'Błędne wywołanie aplikacji5');
        $this->formregister->role = ParamUtils::getFromRequest('role', true, 'Błędne wywołanie aplikacji6');
        




        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->formregister->login))) {
            Utils::addErrorMessage('Wprowadź login');
        }
        if (empty(trim($this->formregister->password))) {
            Utils::addErrorMessage('Wprowadź hasło');
        }
        if (empty(trim($this->formregister->imie))) {
            Utils::addErrorMessage('Wprowadź imie');
        }
        if (empty(trim($this->formregister->nazwisko))) {
            Utils::addErrorMessage('Wprowadź nazwisko');
        }
        if (empty(trim($this->formregister->telefon))) {
            Utils::addErrorMessage('Wprowadź telefon');
        }

        //Sprawdzam czy nie istnieje już taki użytkownik

        $clogin = App::getDB()->select("user", [
          "login"
        ], [
          "login"=>$this->formregister->login,
        ]);

        if($clogin)
        {
          Utils::addErrorMessage('Podany login jest zajęty');
        }

        if(strlen($this->formregister->telefon)!=9)
        {
          Utils::addErrorMessage('Numer telefonu musi mieć 9 cyfr');
        }




        


        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    public function action_registerNew() {
        $this->generateView();
    }

    public function action_registerSave() {


          if ($this->validateSaveRegister()) {
              //Jeżeli się zgadza i jest poprawnie, to dodaję użytkownika do bazy

              try {

                    //Jeżeli wybrał że jest właścicielem
                      $hashreg=sha1($this->formregister->password);

                      if($this->formregister->role=="1"){

                        App::getDB()->insert("user", [
                             
                              "login" => $this->formregister->login,
                              "password" => $hashreg,
                              "imie" => $this->formregister->imie,
                              "nazwisko" => $this->formregister->nazwisko,
                              "telefon" => $this->formregister->telefon,
                              "role" => "wlasciciel",
                              "aktywny" => "1",
                              "Klinika_idKlinika" => "1"
                              ]);

                        Utils::addInfoMessage('Pomyślnie utworzono konto właściciela');


                        //Jeżeli wybrał ze jest weterynarzem

                      } else if ($this->formregister->role=="2") {

                              $this->formregister->klinika = ParamUtils::getFromRequest('klinika', true, 'Błędne wywołanie aplikacji7');

                              App::getDB()->insert("user", [
                             
                                "login" => $this->formregister->login,
                                "password" => $hashreg,
                                "imie" => $this->formregister->imie,
                                "nazwisko" => $this->formregister->nazwisko,
                                "telefon" => $this->formregister->telefon,
                                "role" => "weterynarz",
                                "aktywny" => "0",
                                "Klinika_idKlinika" => $this->formregister->klinika
                                ]);

                          Utils::addInfoMessage('Pomyślnie utworzono konto weterynarza');

                      } else {  

                          Utils::addInfoMessage('Nie udało się utworzyć konta.');


                      }

              } catch (\PDOException $e) {
                  Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas tworzenia konta');
                  if (App::getConf()->debug)
                      Utils::addErrorMessage($e->getMessage());
              }

              App::getRouter()->forwardTo('signup');
          } else {
              $this->generateView();
          }
      }







// FORMULARZ LOGOWANIA






  public function validateLog() {

    $this->formlogin->login = ParamUtils::getFromRequest('login');
    $this->formlogin->password = ParamUtils::getFromRequest('password');

    if(!isset($this->formlogin->login))
      return false;

    if(empty($this->formlogin->login))
      Utils::addErrorMessages('nie podano loginu');

    if(empty($this->formlogin->password))
      Utils::addErrorMessages('nie podano hasła');




    if(App::getMessages()->isError())
      return false;

    $hashlog=sha1($this->formlogin->password);



    $logindb = App::getDB()->Select("user", [
      "idUser",
      "password",
      "role",
    ],[
      'login' => $this->formlogin->login,
      'password' => $hashlog,
    ]);

    //$role=['role'];

    if ($logindb) {
      //RoleUtils::addRole($role);
    } else {
      Utils::addErrorMessage('Niepoprawny login lub hasło');
    }

    return !App::getMessages()->isError();

  }

  public function action_loginview(){
    $this->generateView();
  }

  public function action_login() {

    if($this->validateLog()) {

      Utils::addErrorMessage('Poprawnie zalogowano');

      //Pobiera informacje przy logowaniu o użytkowniku - jakie jest jego id, rola i login. Dane te są trzymane w sesji.

      $pobierz = App::getDB()->get("user", [
        "role",
        "iduser"], [
        "login" => $this->formlogin->login,
      ]);
      $this->formlogin->role = $pobierz["role"];
      $this->formlogin->iduser = $pobierz["iduser"];


      RoleUtils::addRole($this->formlogin->role);
      SessionUtils::store("iduser",$this->formlogin->iduser);



      //Sprawdza kto się zalogował. Jezeli weterynarz - przenosi na profilvet itp.

      if(RoleUtils::inRole("weterynarz")==true)
      {
          App::getRouter()->redirectTo("profilvet");
      }
      if(RoleUtils::inRole("wlasciciel")==true)
      {
          App::getRouter()->redirectTo("profil");
      }
      if(RoleUtils::inRole("admin")==true)
      {
          App::getRouter()->redirectTo("admin");
      }
      else
         App::getRouter()->redirectTo("glowna");








    } else {
      $this->generateView();
    }

  }


//Wylogowanie

  public function action_logout() {

    session_destroy();

    App::getRouter()->redirectTo("glowna");

  }
 




  public function action_signup() {

  	$sqlkliniki="SELECT * FROM `klinika`";

  	try {
            $this->kliniki = App::getDB()->query($sqlkliniki);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

    

    
    App::getSmarty()->assign('kliniki', $this->kliniki);
 
    $this->generateView();
 
  }

  public function generateView() {
    
    App::getSmarty()->assign('formregister',$this->formregister);
   App::getSmarty()->assign('formlogin',$this->formlogin);
    App::getSmarty()->display("signup.tpl");
 
  }

}