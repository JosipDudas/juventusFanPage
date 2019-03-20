<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

$mysqli->set_charset($znakovi);

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['surname'] = $_POST['surname'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['name']);
$last_name = $mysqli->escape_string($_POST['surname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['psw'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM korisnici WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'Korisnik s tim email-om već postoji!';
    header("location: index.php#ulaznice");
    
}
else { // Email doesn't already exist in a database, proceed...
    if($_POST['psw']==$_POST['rpsw']){
        $today = date('Y-m-d');
        // active is 0 by DEFAULT (no need to include it here)
        $sql = "INSERT INTO korisnici (ime, prezime, email, lozinka, hash, datum_stvaranja) " 
                . "VALUES ('$first_name','$last_name','$email','$password', '$hash', '$today')";
        // Add user to the database
        if ( $mysqli->query($sql) ){

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

            Hvala što si se registrirao/la!

            Klikni na link ispod kako bi aktivirao/la svoj korsinički račun:

            http://localhost/juventusFanPage/verify.php?email=$email&hash=$hash;";
            $mail->setFrom('josdudasrpk@gmail.com', 'JD');
            $mail->addAddress($email);

            if($mail->send()){
                $_SESSION['message'] = "Poslan Vam je email potvrde na adresu $email, molim Vas potvrdite svoju email adresu klikom na link u poruci!";
                header("location: index.php#ulaznice");
            }


            $_SESSION['active'] = 0; //0 until user activates their account with verify.php
            $_SESSION['logged_in'] = true; // So we know the user has logged in
        }
        else {
            $_SESSION['message'] = 'Registracija nije uspijela!';
            header("location: index.php#ulaznice");
        }
    }
    else{
        $_SESSION['message'] = "Lozinke nisu jednake!";
        header("location: index.php#ulaznice");
    }
    

   

}