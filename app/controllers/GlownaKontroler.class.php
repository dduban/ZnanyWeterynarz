<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class GlownaKontroler {
 
  public function action_glowna() {
 
    App::getSmarty()->display("glowna.tpl");
 
  }
 
}