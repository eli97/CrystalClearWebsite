<?php

session_start();

include 'connect.php';

if (isset($_SESSION['email']))
{
    if ($_SESSION['type'] = 'user')
    {
        echo $_SESSION['email'] . 'normal user';
    }

    if ($_SESSION['type'] = 'admin')
    {
        echo $_SESSION['email'] . 'amdin user';
    }
}
?>