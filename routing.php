<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('glowna'); #default action
App::getRouter()->setLoginRoute('signup');

//Utils::addRoute('hello', 'HelloCtrl');
//Utils::addRoute('action_name', 'controller_class_name');
Utils::addRoute('glowna', 'GlownaKontroler');

Utils::addRoute('signup', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');

Utils::addRoute('registerSave', 'LoginCtrl');
Utils::addRoute('registerNew', 'LoginCtrl');

Utils::addRoute('profil', 'ProfilCtrl',	['wlasciciel','admin']);
Utils::addRoute('zwierzeSave', 'ProfilCtrl',	['wlasciciel','admin']);
Utils::addRoute('zwierzeNew', 'ProfilCtrl',	['wlasciciel','admin']);
Utils::addRoute('wizytaSave', 'ProfilCtrl',	['wlasciciel','admin']);
Utils::addRoute('wizytaNew', 'ProfilCtrl',	['wlasciciel','admin']);


Utils::addRoute('profilvet', 'ProfilvetCtrl',	['weterynarz','admin']);
Utils::addRoute('wizytaDelete', 'ProfilvetCtrl',	['weterynarz','admin']);

Utils::addRoute('admin', 'AdminCtrl',	['admin']);
Utils::addRoute('vetDelete', 'AdminCtrl',	['admin']);
Utils::addRoute('vetAccept', 'AdminCtrl',	['admin']);