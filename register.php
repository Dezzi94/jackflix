<?php
    if(isset($_POST["submitButton"])) {
        echo "Form was submitted";

        $firstName = sanitizeFormString ($_POST['firstName']);
        
        function sanitizeFormString($inputText) {
            $inputText = strip_tags($inputText);
            $inputText = str_replace("","",$inputText);
            $inputText = strtolower($inputText);
            $inputText = ucfirst($inputText);
            return $inputText;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Jackflix</title>
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>
<body>
    <div class="signInContainer">
        <div class="column">
            <div class="header">
            <img src="assets/images/jackflix-logo.png" alt="Site Logo" title="logo">
                <h3>Sign Up</h3>
                <span>to continue to Jackflix</span>
            </div>
            <form action="" method="POST">
                <input type="text" name="firstName" placeholder="First Name" required>
                <input type="text" name="lastName" placeholder="Last Name" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="email2" name="email2" placeholder="Confirm Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password2" placeholder="Confirm Password" required>
                <input type="submit" name="submitButton" value="SUBMIT">
            </form>

            <a href="login.php" class="signInMessage">Already have an account? Sign in here</a>
        </div>
    </div>
</body>
</html>