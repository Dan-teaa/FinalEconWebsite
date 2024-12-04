<?php

namespace app\controllers;
require_once '../app/models/EventModel.php';
use app\models\EventModel;

class EventController {
    private $eventModel;
    public function __construct() {
        $this->eventModel = new EventModel();
        error_log('(2) __Construct in Event Controller initialized');
    }

   

    /**
     * Fetch upcoming events and return as JSON.
     */
    public function getUpcomingEvents() {
        error_log('(4) INSIDE EVENTCONTROLLER: Function was called');
    
        $events = $this->eventModel->getUpcomingEvents();
        
        if ($events === false) {
            error_log('(X) Failed to fetch upcoming events');
        }
 
        header('Content-Type: application/json');
        echo json_encode($events);
        error_log('(8) Events from model: ' . print_r($events, true));


    }
}
