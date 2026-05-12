<?php
/**
 * Scenario C: Logout Script
 */
session_start();
session_destroy();
header("Location: index.php");
exit;
?>