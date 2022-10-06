<?php 
    include_once('connect.php');

    // taking input values from the update form
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $street = $_REQUEST['street'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $zipcode = $_REQUEST['zipcode'];  // missing field in database
    $phonenumber = $_REQUEST['phonenumber'];
    $email = $_REQUEST['email'];

    // clean up inputs to match database fields
    $cname = $firstname . ' ' . $lastname;

    // insert the values into the database
    $sql = "INSERT INTO tablename (cname, street, city, state, phone, email) VALUES ($cname, $street, $city, $state, $phonenumber, $email)";
?>