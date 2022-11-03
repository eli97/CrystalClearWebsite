<?php

if (isset($_POST["submit"])) {
    
    $user_fname = $_POST["user_fname"];
    $user_lname = $_POST["user_lname"];
    $user_email = $_POST["user_email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($user_fname, $user_lname, $user_email, $password, $cpassword) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($user_email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (passwordMatch($password, $cpassword) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (emailExists($conn, $user_email) !== false) {
        header("location: ../signup.php?error=emailtaken");
        exit();
    }

    createUser($conn, $user_fname, $user_lname, $user_email, $password);
}

else {
    header("location: ../signup.php");
    exit();
}