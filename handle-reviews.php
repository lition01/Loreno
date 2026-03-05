<?php
header('Content-Type: application/json');

$reviewsFile = 'reviews.json';
$logFile = 'reviews.log';

// Helper function for logging
function logAction($action, $data) {
    global $logFile;
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "[$timestamp] ACTION: $action | DATA: " . json_encode($data) . PHP_EOL;
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}

// Ensure files exist
if (!file_exists($reviewsFile)) {
    file_put_contents($reviewsFile, json_encode([]));
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $reviews = json_decode(file_get_contents($reviewsFile), true);
    echo json_encode($reviews);
    exit;
}

if ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input']);
        exit;
    }

    // Server-side auth check (basic)
    if (empty($input['userEmail'])) {
        http_response_code(401);
        echo json_encode(['error' => 'Authentication required']);
        exit;
    }

    $reviews = json_decode(file_get_contents($reviewsFile), true);

    // Validation: Check for duplicates
    foreach ($reviews as $r) {
        if (isset($r['productId'], $r['userEmail'], $r['text']) &&
            $r['productId'] == $input['productId'] && 
            $r['userEmail'] == $input['userEmail'] && 
            $r['text'] == $input['text']) {
            http_response_code(409);
            echo json_encode(['error' => 'Duplicate review detected']);
            exit;
        }
    }

    // Add new review
    $newReview = [
        'id' => time() . rand(100, 999),
        'productId' => $input['productId'],
        'product' => $input['product'],
        'name' => $input['name'] ?? 'Verified Customer',
        'userEmail' => $input['userEmail'],
        'rating' => (int)$input['rating'],
        'text' => $input['text'],
        'date' => date('Y-m-d'),
        'verified' => true
    ];

    array_unshift($reviews, $newReview);
    
    if (file_put_contents($reviewsFile, json_encode($reviews, JSON_PRETTY_PRINT))) {
        logAction('SUBMIT_REVIEW', $newReview);
        echo json_encode(['success' => true, 'review' => $newReview]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to save review']);
    }
    exit;
}

if ($method === 'DELETE') {
    // Basic delete for admin dashboard sync
    $id = $_GET['id'] ?? null;
    if (!$id) {
        http_response_code(400);
        echo json_encode(['error' => 'ID required']);
        exit;
    }

    $reviews = json_decode(file_get_contents($reviewsFile), true);
    $newReviews = array_filter($reviews, function($r) use ($id) {
        return (string)$r['id'] !== (string)$id;
    });

    if (file_put_contents($reviewsFile, json_encode(array_values($newReviews), JSON_PRETTY_PRINT))) {
        logAction('DELETE_REVIEW', ['id' => $id]);
        echo json_encode(['success' => true]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to delete review']);
    }
    exit;
}
?>