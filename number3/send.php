<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if (isset($_POST["send"])) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sanjose2121641@mkt.ceu.edu.ph';
        $mail->Password = 'kwelrvdtwlagsyto';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];
        $mail->setFrom('sanjose2121641@mkt.ceu.edu.ph');
        $mail->addAddress($_POST["email"]);
        $mail->isHTML(true);

        $mail->send();

        echo 
        "
        <script>
        alert('Sent Successfully');
        document.location.href='index.php';
        </script>
        ";
    }
?>