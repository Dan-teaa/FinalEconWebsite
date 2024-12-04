<?php

namespace app\models;
require_once 'Model.php';

class EventModel extends Model {
    protected $table = 'events';

    public function getUpcomingEvents() {
        error_log('(5) Entered EventModel::getUpcomingEvents()');
        $db = $this->connect();
        
        if ($db === false) {
            error_log('(6) Failed to connect to the database');
        } else {
            error_log('(6) Connected to the database');
        }

        $sql = "SELECT * FROM $this->table WHERE date >= CURDATE() ORDER BY date ASC";
        $stmt = $db->prepare($sql);

        $stmt->execute();

        if (!$stmt->execute()) {
            error_log('(7) Statement execution failed: ' . print_r($stmt->errorInfo(), true));
            return [];
        } else {
            error_log('(7) Statement executed successfully');
        }
    
        $events = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        error_log('Fetched upcoming events: ' . print_r($events, true));
        return $events;
    }
}



