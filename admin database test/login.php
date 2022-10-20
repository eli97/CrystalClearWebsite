<?php

session_start();
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en" dor="ltr">
    <head>
        <meta cahrset="utf-8">
        <title>Test Login</title>
    </head>

    <body>

    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
        <input type="text" name="email">
        <input type="password" name="password">
        <input type="submit" value="login">

    </form>

    </body>

</html>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1");
        $stmt->execute(array($email, $password));
        $checkuser = $stmt->rowCount();
        $user = $stmt->fetch();

        if ($checkuser != "admin")
        {
            $_SESSION['email'] = $user['username'];
            $_SESSION['type'] = $user['type'];
            header('location: home.php');
        }

    }

?>