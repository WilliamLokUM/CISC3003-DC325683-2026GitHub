<?php
/**
 * Scenario C: Home Page before login
 */
session_start();
require 'connect.php';

$is_logged_in = isset($_SESSION['user_id']);
$user_data = null;

if ($is_logged_in) {
    $sql = "SELECT name, dot_balance, created_at FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $user_data = $stmt->get_result()->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOT System - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <?php if ($is_logged_in): ?>
    <script src="../js/script.js" defer></script>
    <?php endif; ?>
</head>
<body>

    <?php if (!$is_logged_in): ?>
        <header style="text-align: center; margin-top: 50px;">
            <h1>Welcome to DOT System</h1>
            <p>The next generation of digital asset management.</p>
            <div style="margin-top: 30px;">
                <a href="login.php"><button>Log In</button></a>
                <a href="register.php"><button>Sign Up</button></a>
            </div>
        </header>
        
        <section style="margin-top: 50px;">
            <h2>About Our Services</h2>
            <ul>
                <li>Secure Account Authentication</li>
                <li>Real-time DOT Coin Balance Tracking</li>
                <li>Instant Email Verifications</li>
            </ul>
        </section>

    <?php else: ?>
        <header>
            <h1>Dashboard</h1>
            <p>Hello, <?php echo htmlspecialchars($user_data['name']); ?>!</p>
        </header>

        <section style="background-color: #1a1a1a; padding: 20px; border-radius: 8px; border: 1px solid #333;">
            <h3>Assets Overview</h3>
            <p style="font-size: 1.5em;">
                <strong>Current Balance: </strong> 
                <span id="dot-balance" style="color: #ffd700;"><?php echo $user_data['dot_balance']; ?></span> DOT
            </p>
            <button type="button" id="add-dot-btn" style="background-color: #28a745; color: white;">+ Add 100 DOT Coins</button>
            <p id="balance-message" style="font-size: 0.9em; margin-top: 10px;"></p>
        </section>

        <section style="margin-top: 20px;">
            <h3>Account Info</h3>
            <p><strong>Member Since:</strong> <?php echo date("F j, Y", strtotime($user_data['created_at'])); ?></p>
            <p><strong>Security Status:</strong> <span style="color: #28a745;">Verified Account</span></p>
        </section>

        <div style="margin-top: 40px;">
            <form action="logout.php" method="POST">
                <button type="submit" style="background-color: #dc3545; color: white;">Log Out</button>
            </form>
        </div>
    <?php endif; ?>

    <hr style="margin-top: 50px;">
    <footer>
        <p>CISC3003 Web Programming: LOK WANG FONG + DC325683 + 2026</p>
    </footer>

</body>
</html>