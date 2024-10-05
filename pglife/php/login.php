<?php
session_start();
header('Content-Type: application/json');

// Define hardcoded credentials
$valid_email = 'user@example.com'; // Replace with your email
$valid_password = 'password123'; // Replace with your password

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate credentials
    if ($email === $valid_email && $password === $valid_password) {
        $_SESSION['user'] = $email; // Store user information in session
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle GET request, possibly return user session status
    if (isset($_SESSION['user'])) {
        echo json_encode(['success' => true, 'message' => 'User is logged in', 'user' => $_SESSION['user']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'User is not logged in']);
    }
} else {
    // If not a POST or GET request, return 405
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
}
?>
