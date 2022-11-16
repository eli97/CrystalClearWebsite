<?php
    //header('location: ../../profile.php');
    $conn = new mysqli('localhost', 'root', 'password1', 'crystalclear');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // Test Data
    $cid = $_GET['id'];
    $sql = "SELECT * FROM customer WHERE cid = '$cid'";
    $result = mysqli_query($conn, $sql);
    $customer = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    // taking input values from the update form
    $cname = $_POST['fullname'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    //$zipcode = $_POST['zipcode'];  // Todo: Add field in database
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // insert the values into the database
    $ins = "UPDATE customer SET cname='$cname', street='$street', city='$city', state='$state', phone='$phone', email='$email' WHERE cid='$cid'";
    $res = mysqli_query($conn, $ins);

    mysqli_close($conn);

    if ($res) {
        echo '<script>alert("Profile Updated Successfully!")</script>';
        echo '<script>window.location.href = "../../profile.php"</script>';
    }
    else {
        echo '<script>alert("Update unsuccessful, an error has occurred.")</script>';
    }
?>