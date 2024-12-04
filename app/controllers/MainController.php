<?php

namespace app\controllers;
use app\controllers\MainController;

class MainController {

    public function homepage() {
        //remember to route relative to index.php
        include './assets/views/main/homepage.html';
        exit;
    }

    public function notFound() {
    }

}