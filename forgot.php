<?php 
$email = $mysqli->escape_string($_POST['Lemail']);
$result = $mysqli->query("SELECT * FROM korisnici WHERE email='$email'");

if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "Korisnik s tim email-om ne postoji!";
        header("location: index.php#ulaznice");  
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['ime'];

        //Slanje maila putem phpmailera
        require 'phpmailer/PHPMailerAutoload.php';
        $mail= new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "josdudasrpk@gmail.com";
        $mail->Password = "hxTJCGmu";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->Subject = "Account Verification ( juventusFanPage )";
        $mail->Body = "
        Pozdrav $first_name,

        Zahtjevali ste reset lozinke!

        Klikni na link ispod kako bi resetirali svoju lozinku:

        http://localhost/juventusFanPage/reset.php?email=$email&hash=$hash";
        $mail->setFrom('josdudasrpk@gmail.com', 'JD');
        $mail->addAddress($email);

        if($mail->send()){
          $_SESSION['message'] = "Provjerite svoj email $email, poslan Vam je link za reset lozinke!";
            header("location: index.php#ulaznice");
        } 
  }