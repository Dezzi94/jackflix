<?php
    require_once("includes/config.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Account.php");

    $account = new Account($con);
    
    if(isset($_POST["submitButton"])) {
        
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        //Makes the call to check the first name length is run through the function validateFirstName. 
        $account->validateFirstName($firstName);

/*      echo $firstName . "<br>";
        echo $lastName . "<br>";
        echo $username . "<br>";
        echo $email . "<br>";
        echo $email2 . "<br>";
        echo $password . "<br>";
        echo $password2 . "<br>"; */
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

                <?php echo $account->getError("First name wrong lenth"); ?>
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