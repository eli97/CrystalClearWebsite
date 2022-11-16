<?php

    //connect via PDO -- Change these values to match live site database
    /*
    $dbname = "crystalcleartestdb";
    $dbuser = "dev";
    $dbpass = "1234";
    $dbhost = "localhost";
    */

    error_reporting(E_ALL & ~E_NOTICE);
    define("DB_HOST", "localhost");
    define("DB_NAME", "rystaly5_CrystClearMainDB");
    define("DB_CHARSET", "utf8");
    define("DB_USER", "rystaly5_cbearquiver");
    define("DB_PASSWORD", "SvenThePlant!");

    try{
        $pdo = new PDO("mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    }
    catch (PDOException $err){
        echo "Database connection problem: " . $err->getMessage();
        exit();  
    }

    $stmt = $pdo->prepare("SELECT * FROM `CUSTOMER`");
    $stmt->execute();
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null; 

    //function to call db if needed. -----NEEDS PARAMETER TO TAKE IN GOOGLE ID TO CHECK WITH DB FOR APPROPRIATE CUSTOMER TO CHANGE-----
    function editdb() {
        $dbname = "crystalcleartestdb";
        $dbuser = "dev";
        $dbpass = "1234";
        $dbhost = "localhost";
        try{
            $pdo = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpass);
        }
        catch (PDOException $err){
            echo "Database connection problem: " . $err->getMessage();
            exit();  
        }
    
        $stmt = $pdo->prepare("UPDATE customer SET serviceName='No Service' WHERE gid='102712085469581371340'"); //adjust this for live site
        $stmt->execute();
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        $stmt = null;
        include './phpmailer/service_mailer.php';
    }

    //Set to 'No Service' when cancel service is pressed and conditions are met.
    if(isset($_POST['cancel'])){
        //$gid = $_POST['gid']
        editdb(); //ADD gid as parameter
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Crystal Clear Service Manager</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Application-Form.css">
    <link rel="stylesheet" href="assets/css/Articles-Cards-images.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel-slider.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider-mycarousel.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider.css">
    <link rel="stylesheet" href="assets/css/Customizable-Carousel-swipe-enabled.css">
    <link rel="stylesheet" href="assets/css/dropdown-search-bs4.css">
    <link rel="stylesheet" href="assets/css/ensign-form-form.css">
    <link rel="stylesheet" href="assets/css/ensign-form.css">
    <link rel="stylesheet" href="assets/css/figloo-carousal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="assets/css/NMDIG-Jumbotron-Advanced-Responsive-Tint-jumbotron-bg-responsive-tint.css">
    <link rel="stylesheet" href="assets/css/NMDIG-Jumbotron-Advanced-Responsive-Tint.css">
    <link rel="stylesheet" href="assets/css/Signup-page-with-overlay.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span><a href="main.html"><img
                            src="assets/img/CClogo2.svg" width="248" height="79"></a></span></a><button
                data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span
                    class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="main.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="estimate.html">Estimates</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    <li class="nav-item" id="profile"><a class="nav-link" href="profile.php">Profile</a></li>
                </ul><a class="btn btn-primary border-0 border-dark ms-md-2" role="button" onclick="logout()"
                    style="background: #171e28;--bs-primary: #052065;--bs-primary-rgb: 5,32,101;">Logout</a>
            </div>
        </div>
    </nav>
    <h2 class="text-center">Manage Services</h2>
    <div style="background: url(&quot;assets/img/water1.png&quot;) top / cover no-repeat;">
        <div class="container justify-content-center">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card p-5 content justify-content-center" style="width:750px">
                        <!--<h1 class="col d-flex justify-content-center">My Services</h1>-->
                            <!--current services-->
                            <div class="card text-center">

                                <?php foreach($customers as $customer){ 
                                        if($customer['gid'] == '102712085469581371340') {?>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <h5>Next Appointment</h5>
                                        </div>
                                        <div class="col-md-6 text-secondary">
                                            <h5>12/31/2022</h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>Current Subscription</h5>
                                        </div>
                                        <div class="col-md-6 text-secondary">
                                            <h5><?php echo htmlspecialchars($customer['serviceName']); ?></h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4 d-inline-flex">
                                            <h5>Payment History</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary" float="right" role="button" href="https://www.paypal.com/us/home">Paypal</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!--
                                <form>
                                    <div class="col-md-3" style="margin-left: 20px">
                                        <input type="radio" onchange="service_change(basic)" name="basic_service" id=basicService value="BasicService">
                                        <label for="basicService">Basic Service</label>
                                        
                                    </div>
                                    <div class="col-md-3" style="margin-left: 20px">
                                        <input type="radio" onchange="service_change(chemBask)" name="basic_service" id=basicService value="BasicService">
                                        <label for="basicService">Chemical + Baskets</label>
                                    </div>
                                    <div class="col-md-3" style="margin-left: 20px">
                                        <input type="radio" onchange="service_change(basic)" name="basic_service" id=basicService value="BasicService">
                                        <label for="basicService">Full Service</label>
                                    </div>
                                </form>-->
                                <div class="row align-content-center">

                                    <!--Can add redirect to paypal when its available, for now it's just a prompt-->

                                    <?php if($customer['isActive'] == 1) { ?>
                                    
                                        <div class="col-sm-8 mb-5"  style="float: none; margin: 0 auto;">
                                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#popup">Change Service</button>
                                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#popup">Cancel Service</button>
                                        </div>
                                        <!--
                                        <div class="col-sm-5 mb-5" style="margin-top: 20px">
                                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#popup">Cancel Service</button>
                                        </div>
                                        -->

                                    <?php } ?>

                                    <?php if($customer['isActive'] == 0) { ?>
                                        <form method="post">
                                            <div class="col-sm-8 mb-5 align-content-center"  style="float: none; margin: 0 auto;">
                                                <button class="btn btn-outline-danger btn-sm">Change Service</button>
                                                <button class="btn btn-outline-danger btn-sm" name="cancel">Cancel Service</button>
                                            </div>
                                            <!--
                                            <div class="col-sm-5 mb-5" style="margin-top: 20px">
                                                <button class="btn btn-outline-danger btn-sm" name="cancel">Cancel Service</button>
                                            </div>
                                            -->
                                        </form>
                                    <?php } ?>

                                </div>

                                <?php }} ?>

                            </div>
                            <!--end-->
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>


            <!--Account Deletion Popup Window-->
            <div class="modal fade" id="popup" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Please cancel your paypal subscription first.</p>
                        </div>
                        <div class="modal-footer">
                            <!--<button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-target="#confirm" onclick="confirmed()">Close</button>-->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
    <footer class="text-center">
        <div class="container text-muted py-4 py-lg-5">
            <p>Servicing the greater Sacramento area<br>Sacramento, California 95825<br>email:
                no-reply@email.com<br>phone: (916) 123-4567<br><br></p>
            <p class="mb-0">Copyright © 2022 Crystal Clear</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Customizable-Carousel-swipe-enabled.js"></script>
    <script src="assets/js/Application-Form-1.js"></script>
    <script src="assets/js/Application-Form.js"></script>
    <script src="assets/js/Card-Carousel.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="assets/js/customerinfo.js" defer></script>

    <script>
        function confirmed() {
            location.href = "login.php";
        }

        function logout() {
            localStorage.clear();
            location.href = "login.php";
        }
    </script>

</body>

</html>