<?php
/**
 * Scenario C: Backend script to update DOT balance via Ajax
 */
session_start();
require 'connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "Unauthorized"]);
    exit;
}

$userId = $_SESSION['user_id'];
$amountToAdd = 100;

$sql = "UPDATE users SET dot_balance = dot_balance + ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $amountToAdd, $userId);

if ($stmt->execute()) {
    $sql_fetch = "SELECT dot_balance FROM users WHERE id = ?";
    $stmt_fetch = $conn->prepare($sql_fetch);
    $stmt_fetch->bind_param("i", $userId);
    $stmt_fetch->execute();
    $new_balance = $stmt_fetch->get_result()->fetch_assoc()['dot_balance'];

    echo json_encode([
        "success" => true, 
        "new_balance" => $new_balance,
        "message" => "Successfully added $amountToAdd DOT!"
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Database error"]);
}

$stmt->close();
$conn->close();
?>