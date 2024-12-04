<?php

namespace app\core;
use app\controllers\MainController;
use app\controllers\EventController;
use app\controllers\MemberController;
require_once '../app/controllers/MainController.php';
require_once '../app/controllers/EventController.php';
require_once '../app/controllers/MemberController.php';


class Router {
    public $urlArray;

    function __construct()
    {
        $this->urlArray = $this->routeSplit();
        $this->handleMainRoutes();
        $this->handleEventRoutes();
        $this->handleMemberRoutes();
    }

    protected function routeSplit() {
        $removeQueryParams = strtok($_SERVER["REQUEST_URI"], '?');
        $urlArray = explode("/", trim($removeQueryParams, "/"));
        return $urlArray;
    }

    protected function handleMainRoutes() {

        if ($this->urlArray[0] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {

            $mainController = new MainController();
            $mainController->homepage();
        }
    }

    protected function handleEventRoutes() {
        error_log('(1) Entered Router -> Handling event routes...');
        $eventController = new EventController();
    
        // Check for /events/upcoming
        if (
            isset($this->urlArray[0], $this->urlArray[1]) &&
            $this->urlArray[0] === 'events' &&
            $this->urlArray[1] === 'upcoming' &&
            $_SERVER['REQUEST_METHOD'] === 'GET'
            ) {
            error_log('(3) URL was a match, and calling getUpcomingEvents() in EventController');
            $eventController->getUpcomingEvents();

            return;
        }
    }

    protected function handleMemberRoutes() {
        $memberController = new MemberController();

        // Handle POST request for form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->urlArray[0] === 'join' && $this->urlArray[1] === 'submit') {
            $memberController->handleJoinSubmission();
            return;
        }
    
        // Handle GET request to render the join page
        if ($this->urlArray[0] === 'index.php' && $this->urlArray[1] === 'join') {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $memberController->renderJoinPage();
                return;
            }
            
        }
    }
    
    



}