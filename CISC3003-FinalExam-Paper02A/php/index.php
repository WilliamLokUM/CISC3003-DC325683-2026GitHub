<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scenario A - User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>User Registration (Scenario A)</h1>
    
    <form action="process.php" method="POST">
        
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <fieldset>
            <legend>Gender:</legend>
            <label><input type="radio" name="gender" value="Male" required> Male</label>
            <label><input type="radio" name="gender" value="Female"> Female</label>
            <label><input type="radio" name="gender" value="Other"> Other</label>
        </fieldset>

        <label for="country">Country:</label>
        <select id="country" name="country" required>
            <option value="">Select a country</option>
            <option value="Macau">Macau</option>
            <option value="China">China</option>
            <option value="Other">Other</option>
        </select>

        <fieldset>
            <legend>Interests:</legend>
            <label><input type="checkbox" name="interests[]" value="Coding"> Coding</label>
            <label><input type="checkbox" name="interests[]" value="Reading"> Reading</label>
            <label><input type="checkbox" name="interests[]" value="Sports"> Sports</label>
        </fieldset>

        <label for="bio">Short Bio:</label>
        <textarea id="bio" name="bio" rows="4" required></textarea>

        <button type="submit">Submit Data</button>
    </form>

    <hr>
    <footer>
        <p>CISC3003 Web Programming: LOK WANG FONG + DC325683 + 2026</p>
    </footer>
</body>
</html>