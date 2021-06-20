<?php
    require_once("includes/config.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Constants.php");
    require_once("includes/classes/Account.php");

    $account = new Account($con);

    
    if(isset($_POST["submitButton"])) {
        echo "Form was submitted";
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

        $success = $account->login($username, $password);

        if($success) {
            //Stores Session
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jackflix</title>
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>
<body>
    <div class="signInContainer">
        <div class="column">
            <div class="header">
            <img src="assets/images/jackflix-logo.png" alt="Site Logo" title="logo">
                <h3>Sign In</h3>
                <span>to continue to Jackflix</span>
            </div>
            <form action="" method="POST">

                <?php echo $account->getError(Constants::$loginFailed); ?>
                <input type="text" name="username" placeholder="Username" required>


                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="submitButton" value="SUBMIT">
            </form>

            <a href="register.php" class="signInMessage">Need an account? Sign Up here</a>
        </div>
    </div>
</body>
</html>