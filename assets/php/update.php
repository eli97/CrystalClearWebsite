<?php
    //header('location: ../../profile.php');
    $conn = new mysqli('localhost', 'rystaly5_cbearquiver', 'SvenThePlant!', 'rystaly5_CrystClearMainDB');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // Test Data
    $sql = "SELECT * FROM CUSTOMER";
    $result = mysqli_query($conn, $sql);
    $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $customer = $customer[0];

    // taking input values from the update form
    $cid = $customer['cid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    //$zipcode = $_POST['zipcode'];  // Todo: Add field in database
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];

    // clean up inputs to match database fields
    //$cname = $firstname . ' ' . $lastname;
    $cname = $firstname;

    // insert the values into the database
    $ins = "UPDATE customer SET cname='$cname', street='$street', city='$city', state='$state', phone='$phone', email='$email' WHERE cid='$cid'";
    $res = mysqli_query($conn, $ins);

    mysqli_close($conn);

    if ($res) {
        echo '<script>alert("Profile Updated Successfully!")</script>';
        echo '<script>window.location.href("../../profile.php")</script>';
    }
    else {
        echo '<script>alert("Update unsuccessful, an error has occurred.")</script>';
    }
?>