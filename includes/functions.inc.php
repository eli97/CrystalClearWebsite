<?php

function emptyInputSignup($user_fname, $user_lname, $user_email, $password, $cpassword) {
    $result;

    if(empty($user_fname) || empty($user_lname) || empty($user_email) || empty($password) || empty($cpassword)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($user_email) {
    $result;

    if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $cpassword) {
    $result;

    if($password !== $cpassword) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $user_email) {
    $sql = "SELECT * FROM users WHERE user_email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $user_email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $user_fname, $user_lname, $user_email, $password) {
    $sql = "INSERT INTO users (user_fname, user_lname, user_email, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT); 

    mysqli_stmt_bind_param($stmt, "ssss", $user_fname, $user_lname, $user_email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($user_email, $password) {
    $result;

    if(empty($user_email) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $user_email, $password) {
    $emailExists = emailExists($conn, $user_email);

    if ($emailExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $emailExists["password"];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === flase) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSIOM["id"] = $emailExists["id"];
        $_SESSIOM["user_email"] = $emailExists["user_email"];
        header("location: ../profile.php");
    }
}