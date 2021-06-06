<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\WizytaForm;
use app\forms\ZwierzeForm;



class ProfilCtrl {

     private $formwizyta;
     private $formzwierze; 
     private $formsearch;

     public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->formwizyta = new WizytaForm();
        $this->formzwierze = new ZwierzeForm();
        $this->formsearch = new ZwierzeForm();
    }

    //Formularz dodania zwierzaka


    public function validateSaveZwierze() {


        //pobieram dane z formularza

        $this->formzwierze->imie = ParamUtils::getFromRequest('imie', true, 'Błędne wywołanie aplikacji');
        $this->formzwierze->gatunek = ParamUtils::getFromRequest('gatunek', true, 'Błędne wywołanie aplikacji');
        $this->formzwierze->wiek = ParamUtils::getFromRequest('wiek', true, 'Błędne wywołanie aplikacji');
        $this->formzwierze->plec = ParamUtils::getFromRequest('plec', true, 'Błędne wywołanie aplikacji');



        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->formzwierze->imie))) {
            Utils::addErrorMessage('Wprowadź imie');
        }
        if (empty(trim($this->formzwierze->gatunek))) {
            Utils::addErrorMessage('Wprowadź gatunek');
        }
        if (empty(trim($this->formzwierze->wiek))) {
            Utils::addErrorMessage('Wprowadź wiek');
        }


        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    public function action_zwierzeNew() {
        $this->generateView();
    }

    public function action_zwierzeSave() {


          if ($this->validateSaveZwierze()) {
              try {


                //Jeżeli jest wszystko dobrze to tworzy rekord z danymi z formularza

                          $plec = $_POST['plec'];
                  
                      
                      
                          App::getDB()->insert("zwierze", [
                             
                              "imie" => $this->formzwierze->imie,
                              "gatunek" => $this->formzwierze->gatunek,
                              "wiek" => $this->formzwierze->wiek,
                              "plec" => $plec,
                              "User_wlasciciel" => SessionUtils::load("iduser", $keep = true)
                              ]);
                          
                  
                  Utils::addInfoMessage('Pomyślnie dodano zwierze');
              } catch (\PDOException $e) {
                  Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                  if (App::getConf()->debug)
                      Utils::addErrorMessage($e->getMessage());
              }

              App::getRouter()->forwardTo('profil');
          } else {
              $this->generateView();
          }
      }


                    //  DODAWANIE WIZYTY




      public function validateSaveWizyta() {

        //pobieram dane z formularza
        
        $this->formwizyta->data = ParamUtils::getFromRequest('data', true, 'Błędne wywołanie aplikacji1');
        $this->formwizyta->godzina = ParamUtils::getFromRequest('godzina', true, 'Błędne wywołanie aplikacji2');
        $this->formwizyta->uwagi = ParamUtils::getFromRequest('uwagi', true, 'Błędne wywołanie aplikacji3');
        $this->formwizyta->Zwierze_idZwierze = ParamUtils::getFromRequest('Zwierze_idZwierze', true, 'Błędne wywołanie aplikacji4');
        $this->formwizyta->User_weterynarz = ParamUtils::getFromRequest('User_weterynarz', true, 'Błędne wywołanie aplikacji5');

        //Sprawdzam czy jest formularz uzupełniony

        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->formwizyta->data))) {
            Utils::addErrorMessage('Wprowadź datę');
        }
        if (empty(trim($this->formwizyta->godzina))) {
            Utils::addErrorMessage('Wprowadź godzinę');
        }
        if (empty(trim($this->formwizyta->uwagi))) {
            Utils::addErrorMessage('Wprowadź uwagi');
        }



        //sprawdzam czy data jest w dobrym formacie

        $d = \DateTime::createFromFormat('Y-m-d', $this->formwizyta->data);
        if ($d === false) {
            Utils::addErrorMessage('Zły format daty. Przykład: 2015-12-20');
        }

        $cwizyta = App::getDB()->select("wizyta", [
          "data",
          "godzina",
          "User_weterynarz"
        ], [
          "data"=>$this->formwizyta->data,
          "godzina"=>$this->formwizyta->godzina,
          "User_weterynarz"=>$this->formwizyta->User_weterynarz,
        ]);

        if($cwizyta)
        {
          Utils::addErrorMessage('Podany termin u tego weterynarza jest już zajęty');
        }


        

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
        }

        public function action_wizytaNew() {
            $this->generateView();
        }

        public function action_wizytaSave() {

          if ($this->validateSaveWizyta()) {
              try {

                        //Jeżeli wszystko jest dobrze, to do tabeli "wizyta" tworzy rekord z danymi z formularza
                          
                          $Zwierze_idZwierze = $_POST['Zwierze_idZwierze'];
                          $User_weterynarz = $_POST['User_weterynarz'];
                  
                      
                      
                          App::getDB()->insert("wizyta", [
                             
                              "data" => $this->formwizyta->data,
                              "godzina" => $this->formwizyta->godzina,
                              "uwagi" => $this->formwizyta->uwagi,
                              "Zwierze_idZwierze" => $Zwierze_idZwierze,
                              "User_weterynarz" => $User_weterynarz
                              ]);
                          
                  
                  Utils::addInfoMessage('Pomyślnie umówiono wizytę');
              } catch (\PDOException $e) {
                  Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                  if (App::getConf()->debug)
                      Utils::addErrorMessage($e->getMessage());
              }


              App::getRouter()->forwardTo('profil');
          } else {
              $this->generateView();
          }
      }


    // Akcja profilu (filtrowanie i wyświetlanie z bazy)

       public function validateImie() {

        $this->formsearch->imie = ParamUtils::getFromRequest('sf_imie'); 



        return !App::getMessages()->isError();
    }

 
  public function action_profil() {


    //Filtrowanie wizyt po imieniu psa
            $this->validateImie();


          if (isset($this->formsearch->imie) && strlen($this->formsearch->imie) > 0) {

              $filtr = $this->formsearch->imie . '%';

              $sqlwizyty="SELECT `wizyta`.*, `zwierze`.`idZwierze`,`zwierze`.`imie`, `zwierze`.`User_wlasciciel`, `wizyta`.`User_weterynarz`, `user`.`nazwisko` FROM `wizyta` LEFT JOIN `zwierze` ON `wizyta`.`Zwierze_idZwierze` = `zwierze`.`idZwierze` LEFT JOIN `user` ON `wizyta`.`User_weterynarz` = `user`.`idUser` WHERE `zwierze`.`User_wlasciciel` ='".SessionUtils::load("iduser", $keep = true)."' AND `zwierze`.`imie` LIKE '".$filtr."';";

              try {
                      $this->wizyty = App::getDB()->query($sqlwizyty);
                  } catch (\PDOException $e) {
                      Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                      if (App::getConf()->debug)
                          Utils::addErrorMessage($e->getMessage());
                  }


            }
            else if($this->formsearch->imie=="all" || !isset($this->formsearch->imie))
            {

               $sqlwizyty="SELECT `wizyta`.*, `zwierze`.`idZwierze`,`zwierze`.`imie`, `zwierze`.`User_wlasciciel`, `wizyta`.`User_weterynarz`, `user`.`nazwisko` FROM `wizyta` LEFT JOIN `zwierze` ON `wizyta`.`Zwierze_idZwierze` = `zwierze`.`idZwierze` LEFT JOIN `user` ON `wizyta`.`User_weterynarz` = `user`.`idUser` WHERE `zwierze`.`User_wlasciciel` ='".SessionUtils::load("iduser", $keep = true)."';";

              try {
                      $this->wizyty = App::getDB()->query($sqlwizyty);
                  } catch (\PDOException $e) {
                      Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                      if (App::getConf()->debug)
                          Utils::addErrorMessage($e->getMessage());
                  }

            }


  /*          $imie = "0";


            $this->formsearch->imie = ParamUtils::getFromRequest('imie', true, "Błąd filtrowania");

            
            if($this->formsearch->imie=="0")
            {
                $imie = "%";
            }
            else
            {
                if($this->formsearch->imie=="all")
                {
                    $imie = "%";
                }
                if($this->formsearch->imie!="all")
                {
                    $imie = $this->formsearch->imie;

                }
            }*/

            





 	//Pobieram z bazy informacje o wizytach


 /* 	$sqlwizyty="SELECT `wizyta`.*, `zwierze`.`idZwierze`,`zwierze`.`imie`, `zwierze`.`User_wlasciciel`, `wizyta`.`User_weterynarz`, `user`.`nazwisko` FROM `wizyta` LEFT JOIN `zwierze` ON `wizyta`.`Zwierze_idZwierze` = `zwierze`.`idZwierze` LEFT JOIN `user` ON `wizyta`.`User_weterynarz` = `user`.`idUser` WHERE `zwierze`.`User_wlasciciel` ='".SessionUtils::load("iduser", $keep = true)."' AND `zwierze`.`imie` LIKE '".$imie."';";

  	try {
            $this->wizyty = App::getDB()->query($sqlwizyty);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }*/

        //pobieram z bazy informacje o zwierzetach


        $sqlzwierzeta="SELECT * FROM `zwierze` WHERE `User_wlasciciel`='".SessionUtils::load("iduser", $keep = true)."';";

        try {
            $this->zwierzeta = App::getDB()->query($sqlzwierzeta);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        $sqlzwierzeta2="SELECT * FROM `zwierze` WHERE `User_wlasciciel`='".SessionUtils::load("iduser", $keep = true)."';";

        try {
            $this->zwierzeta2 = App::getDB()->query($sqlzwierzeta2);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        $sqlzwierzeta3="SELECT * FROM `zwierze` WHERE `User_wlasciciel`='".SessionUtils::load("iduser", $keep = true)."';";

        try {
            $this->zwierzeta3 = App::getDB()->query($sqlzwierzeta3);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }


        //pobieram z bazy informacje o weterynarzach

        $sqlklinikivet="SELECT `user`.*, `klinika`.* FROM `user` LEFT JOIN `klinika` ON `user`.`Klinika_idKlinika` = `klinika`.`idKlinika` WHERE `user`.`role`='weterynarz' AND `user`.`aktywny`='1' ORDER BY `klinika`.`miasto`;";

        try {
            $this->klinikivet = App::getDB()->query($sqlklinikivet);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }


        //przesyłam


    App::getSmarty()->assign('searchForm', $this->formsearch);
    App::getSmarty()->assign('klinikivet', $this->klinikivet);
    App::getSmarty()->assign('zwierzeta', $this->zwierzeta);
    App::getSmarty()->assign('zwierzeta2', $this->zwierzeta2);
    App::getSmarty()->assign('zwierzeta3', $this->zwierzeta3);
    App::getSmarty()->assign('wizyty', $this->wizyty);

    $this->generateView();
 
  }

  public function generateView() {
    App::getSmarty()->assign('formwizyta',$this->formwizyta);
   App::getSmarty()->assign('formzwierze',$this->formzwierze);
    App::getSmarty()->display('profil.tpl');
 
  }


}