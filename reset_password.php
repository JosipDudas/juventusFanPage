<?php
/* Password reset process, updates database with new user password */
require 'db.php';
session_start();

// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Make sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);
        
        $sql = "UPDATE korisnici SET lozinka='$new_password', hash='$hash' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {
            $_SESSION['message'] = "Lozinka je resetirana uspješno!";
            header("location: index.php#ulaznice");    
        }

    }
    else {
        $_SESSION['message'] = "Nova lozinka i potvrda nove lozinke ne odgovoraja, ponovite unos!";
        header("location: reset.php");    
    }

}
?>