<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\AdminForm;



class AdminCtrl {

  private $form;

    public function __construct() {
        $this->form = new AdminForm();
    }

  public function validateEdit() {
        $this->form->idUser = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }


    //Zaakceptowanie weterynarza i przypisanie aktywny=="1"

  
    public function action_vetAccept() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("user", "*", [
                    "idUser" => $this->form->idUser,
                    "aktywny" => $this->form->aktywny
                ]);

                App::getDB()->update("user", [
                        "aktywny" => "1"
                            ], [
                        "idUser" => $this->form->idUser
                    ]);

                Utils::addInfoMessage('Pomyślnie zaakceptowano konto weterynarza');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('admin');
    }


    //Odrzucanie weterynarza i usunięcie jego rekordu

    public function action_vetDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("user", [
                    "idUser" => $this->form->idUser
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto konto weterynarza');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('admin');
    }


    

    //Wyświetlanie weterynarzy, którzy nie są aktywny (aktywny=="0")


  public function action_admin() {


  	$sqltoaccept="SELECT `user`.*, `klinika`.`Nazwa` FROM `user` LEFT JOIN `klinika` ON `user`.`Klinika_idKlinika` = `klinika`.`idKlinika` WHERE `user`.`aktywny`='0' AND `user`.`role`='weterynarz';";

  	try {
            $this->toaccept = App::getDB()->query($sqltoaccept);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

      App::getSmarty()->assign('toaccept', $this->toaccept);

      $this->generateView();
    
 
  }

  public function generateView() {
        App::getSmarty()->assign('toaccept', $this->toaccept);
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('admin.tpl');
    }


}