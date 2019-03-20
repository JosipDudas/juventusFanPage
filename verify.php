<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message 
*/
require 'db.php';
session_start();

// Make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    
    // Select user with matching email and hash, who hasn't verified their account yet (active = 0)
    $result = $mysqli->query("SELECT * FROM korisnici WHERE email='$email' AND hash='$hash' AND aktivan='0'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Korisnički račun je već aktiviran ili je URL nevaljan!";
        header("location: index.php#ulaznice");
    }
    else {
        $_SESSION['message'] = "Korisnički račun je aktiviran!";
        
        // Set the user status to active (active = 1)
        $mysqli->query("UPDATE korisnici SET aktivan='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['aktivan'] = 1;
        header("location: index.php#ulaznice");
    }
}
else {
    $_SESSION['message'] = "Nevaljani podaci su uneseni za validaciju!";
    header("location: index.php#ulaznice");
}     
?>