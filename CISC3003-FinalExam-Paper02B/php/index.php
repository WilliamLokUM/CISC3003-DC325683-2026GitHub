<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scenario B - Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Contact Form</h1>
    <p>Please fill out the form below to send us a message.</p>

    <form action="send_mail.php" method="POST">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required placeholder="Enter your name">

        <label for="email">Your Email Address:</label>
        <input type="email" id="email" name="email" required placeholder="example@domain.com">

        <label for="message">Your Message:</label>
        <textarea id="message" name="message" rows="5" required placeholder="Write your message here..."></textarea>

        <button type="submit">Send Message</button>
    </form>

    <hr>
    <footer>
        <p>CISC3003 Web Programming: LOK WANG FONG + DC325683 + 2026</p>
    </footer>
</body>
</html>