<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="550864736847-f9st76mo0i4h0bb5f8remug9pg01pjdg.apps.googleusercontent.com.apps.googleusercontent.com">
    <link rel="icon" type="image/x-icon" href="images\favicon.ico" >
    <title>Sign-up</title>
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
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span><a href="index.html"><img src="assets/img/CClogo2.svg" width="248" height="79"></a></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="estimate.html">Estimates</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="review.html">Review</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                </ul>
                <a id="logbtn" class="btn btn-primary border-0 border-dark ms-md-2" role="button" href="login.html" style="background: #171e28;--bs-primary: #052065;--bs-primary-rgb: 5,32,101;">Login</a>
            </div>
        </div>
    </nav>
    <h1 style="text-align: center;">Sign up</h1>
    <p class="text-center">Fill in the information below.</p>
    <div class="container">
        <div class="row" style="background: url(&quot;assets/img/water1.png&quot;) top / cover no-repeat;">
            <div class="col-12 col-sm-6 col-md-6 col-xxl-4 site-form" style="margin: auto;width: 400px;">
                <form action="includes/signup.inc.php" id="my-form" style="text-align: center;" method="post">
                    <div class="form-group mb-3"><label class="form-label visually-hidden" for="user_fname">First Name</label><input class="form-control" type="text" name="user_fname" placeholder="First Name" autofocus="" style="text-align: left;box-shadow: 0px 0px;" required=""></div>
                    <div class="form-group mb-3"><label class="form-label visually-hidden" for="lastname">Last Name</label><input class="form-control" type="text" name="user_lname" placeholder="Last Name" required=""></div>
                    <div class="form-group mb-3"><label class="form-label visually-hidden" for="user_email">Email Address</label><input class="form-control" type="text" name="user_email" required="" placeholder="Email"></div>
                    <div class="form-group mb-3"><label class="form-label visually-hidden" for="password">Password</label><input class="form-control" type="password" name="password" required="" placeholder="Password"></div>
                    <div class="form-group mb-3"><label class="form-label visually-hidden" for="cpassword">Confirm Password</label><input class="form-control" type="password" name="cpassword" required="" placeholder="Confirm Password"></div>
                    <button class="btn btn-light btn-lg" type="submit" name="submit" style="background: #92c9ff;font-size: 15px;">Signup</button>
                    <a class="btn btn-light btn-lg" role="button" id="form-btn-1" href="login.html" style="background: #92c9ff;font-size: 15px;">Already have an account? Log in</a>
                </form>
            </div>
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == 'emptyinput') {
                        echo "<h2><center>Please fill in all fields!</center></h2>";
                    }
                    else if ($_GET["error"] == 'invalidemail') {
                        echo "<h2><center>Please enter a valid email!</center></h2>";
                    }
                    else if ($_GET["error"] == 'passwordsdontmatch') {
                        echo "<h2><center>Passwords do not match!</center></h2>";
                    }
                    else if ($_GET["error"] == 'emailtaken') {
                        echo "<h2><center>Email already taken!</center></h2>";
                    }
                    else if ($_GET["error"] == 'stmtfailed') {
                        echo "<h2><center>An error has occoured! Please tray again!</center></h2>";
                    }
                    else if ($_GET["error"] == 'none') {
                        echo "<h2><center>You have signed up!</center></h2>";
                    }
                }
            ?>
        </div>
        
    </div>
    <footer class="text-center">
        <div class="container text-muted py-4 py-lg-5">
            <p>Servicing the greater Sacramento area<br>Sacramento, California 95825<br>email: no-reply@email.com<br>phone: (916) 123-4567<br><br></p>
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
    <script src="https://apis.google.com/js/platform.js"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script defer src="../assets/js/Google-Sign-In.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>

    <script type="text/javascript">
        if(sessionStorage.getItem('status') != null) {
            document.getElementById("logbtn").innerHTML = "Logout";
        }
    </script>
</body>

</html>