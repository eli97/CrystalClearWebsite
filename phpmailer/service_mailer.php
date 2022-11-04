<?php
    //Include required phpmailer files
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

    //Define name spaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    //Create instances of phpmailer
    $mail = new PHPMailer();
    //Set mailer to use smtp
    $mail->isSMTP();
    //define smtp host
    $mail->Host = "smtp.gmail.com";
    //enable smtp authentication
    $mail->SMTPAuth = "true";
    //set type of encryption (ssl/tls)
    $mail->SMTPSecure = "tls";
    //set port to connect smtp
    $mail->Port = "587";
    //set gmail username
    $mail->Username = "crystalclearpoolservice.916@gmail.com";
    //set gmail pw
    $mail->Password = "akskgeevsqgfqpvt";
    //set email subject
    $mail->Subject = "Service Cancellation Notice";
    //set email sender
    $mail->setFrom("crystalclearpoolservice.916@gmail.com",'CrystalClearPoolService.DoNotReply',$auto=true);
    //enable html
    $mail->isHTML(true);
    //email body
    $mail->Body = "<h1>Service Cancellation Notice</h1></br>
                    <p id='infoName'>Lorem Ipsum</p></br>
                    <p id='email'>johndoe@gmail.com</p></br>
                    <p>The customer listed above has canceled their service on the website.</p>
                    <a href='https://crystalclearwestsac.com'>Crystal Clear Pool Service</a>";
    //Add recipient
    $mail->addAddress("crystalclearpoolservice.916@gmail.com");
    //Send email
    if($mail->Send()) {
        header("Location:service_manager.php");
    };
    //Closing smtp connection
    $mail->smtpClose();
?>

<script>
    $('#infoName').text(localStorage.getItem('name'));
    $('#email').text(localStorage.getItem('email'));
</script>