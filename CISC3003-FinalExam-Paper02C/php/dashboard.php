<?php
/**
 * Scenario C: User Dashboard with DOT Balance
 */
session_start();
require 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT name, email, dot_balance, created_at FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$reg_date = date("F j, Y", strtotime($user['created_at']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - DOT System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($user['name']) ?>!</h1>
    
    <div style="background-color: #1a1a1a; padding: 20px; border-radius: 8px; border: 1px solid #333;">
        <h3>Financial Overview:</h3>
        <p style="font-size: 1.5em;">
            <strong>Your DOT Balance: </strong> 
            <span id="dot-balance" style="color: #ffd700;"><?= $user['dot_balance'] ?></span> DOT
        </p>
        <button type="button" id="add-dot-btn" style="background-color: #28a745; color: white;">+ Add 100 DOT Coins</button>
        <p id="balance-message" style="font-size: 0.9em; margin-top: 10px;"></p>
    </div>

    <div style="margin-top: 20px;">
        <h3>Profile Details:</h3>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Member Since:</strong> <?= $reg_date ?></p>
    </div>

    <form action="logout.php" method="POST" style="margin-top: 30px;">
        <button type="submit">Log Out</button>
    </form>

    <hr>
    <footer>
        <p>CISC3003 Web Programming: LOK WANG FONG + DC325683 + 2026</p>
    </footer>
</body>
</html>