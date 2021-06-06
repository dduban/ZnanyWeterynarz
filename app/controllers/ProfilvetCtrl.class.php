<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\WizytaForm;



class ProfilvetCtrl {

	private $form;

    public function __construct() {
        $this->form = new WizytaForm();
    }

	public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        $this->form->idSpotkanie = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }


    //Usuwanie wizyty

	public function action_wizytaDelete() {
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("wizyta", [
                    "idSpotkanie" => $this->form->idSpotkanie
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('profilvet');
    }
 



  public function action_profilvet() {

    //pobieram z bazy i wyświetlam w tabeli informacje o wizytach danego weterynarza
    //id aktualnie zalogowanego weterynarza przechowuje "SessionUtils::load("iduser", $keep = true)". keep=true jeżeli chcemy dalej zapisać ta informację w sesji, false=usunąć po użyciu


  	$sqlwizyty="SELECT `wizyta`.*, `zwierze`.`idZwierze`,`zwierze`.`imie` AS `nazwa`, `zwierze`.`User_wlasciciel`, `wizyta`.`User_weterynarz`, `user`.`nazwisko`, `user`.`imie` FROM `wizyta` LEFT JOIN `zwierze` ON `wizyta`.`Zwierze_idZwierze` = `zwierze`.`idZwierze` LEFT JOIN `user` ON `zwierze`.`User_wlasciciel` = `user`.`idUser` WHERE `wizyta`.`User_weterynarz` ='".SessionUtils::load("iduser", $keep = true)."';";

  	try {
            $this->wizyty = App::getDB()->query($sqlwizyty);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
 	
 	App::getSmarty()->assign('wizyty', $this->wizyty);
    App::getSmarty()->display('profil_vet.tpl');
 
  }


 
}