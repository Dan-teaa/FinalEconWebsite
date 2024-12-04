<?php

namespace app\controllers;
use app\controllers\MainController;

class MainController {

    public function homepage() {
        //remember to route relative to index.php
        //require page and exit to return an HTML page
        include './assets/views/main/homepage.html';
        exit;
    }

    public function notFound() {
    }

}