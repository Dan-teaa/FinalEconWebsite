<?php

namespace app\controllers;

use app\models\MemberModel;

require_once '../app/models/MemberModel.php';

class MemberController extends MainController {
    
    //Call to render the join page
    public function renderJoinPage() {
        // Ensure the page is loaded relative to index.php
        include './assets/views/main/join.html';
        exit;
    }

    // Handle form submission
    public function handleJoinSubmission() {
        error_log('handleJoinSubmission reached'); // Server log
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => trim($_POST['first_name'] ?? ''),
                'last_name' => trim($_POST['last_name'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'major' => trim($_POST['major'] ?? ''),
                'minor' => trim($_POST['minor'] ?? ''),
                'school' => trim($_POST['school'] ?? ''),
            ];

            if (empty($data['first_name']) || empty($data['last_name']) || empty($data['email'])) {
                echo json_encode(['success' => false, 'message' => 'All fields are required']);
                http_response_code(400);
                return;
            }

            // Save the member
            $memberModel = new MemberModel();
    
        }

        $mainController = new MainController();
        $mainController->homepage();
    }
}
