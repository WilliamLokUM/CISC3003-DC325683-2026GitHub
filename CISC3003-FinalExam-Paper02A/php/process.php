<?php
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $interests_array = filter_input(INPUT_POST, 'interests', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $interests = !empty($interests_array) ? implode(", ", $interests_array) : "None";

    if (!$email) {
        die("Invalid email format. Please try again. <a href='index.php'>Go back</a>");
    }

    $sql = "INSERT INTO users (fullname, email, gender, country, interests, bio) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("MySQL Prepare Error: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $fullname, $email, $gender, $country, $interests, $bio);

    if ($stmt->execute()) {
        echo "<h2>Record inserted successfully!</h2>";
        echo "<p>Your data has been securely saved.</p>";
        echo "<a href='index.php'>Go back to Form</a>";
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}

echo "<hr>";
echo "<footer><p>CISC3003 Web Programming: LOK WANG FONG + DC325683 + 2026</p></footer>";
?>