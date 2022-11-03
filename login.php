<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
<body>

<div id="box">
    <h2>Log in </h2>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="user_email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Log In</button>

            <a href="signup.php">Click to Signup</a><br><br>
        </form>
    <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == 'emptyinput') {
                        echo "<h2><center>Please fill in all fields!</center></h2>";
                    }
                    else if ($_GET["error"] == 'wronglogin') {
                        echo "<h2><center>Incorrect Login info!</center></h2>";
                    }
                }
    ?>
</div>

</body>
</html>