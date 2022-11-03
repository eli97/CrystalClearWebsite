<?php

if (isset($_POST["submit"])) {

    $user_email = $_POST["user_email"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($user_email, $password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
}
else {
    header("location: ../login.php");
    exit();
}