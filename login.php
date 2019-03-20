<?php
/* User login process, checks if user exists and password is correct */
$mysqli->set_charset($znakovi);
$today = date('Y-m-d');
date_default_timezone_set('Europe/Belgrade');
$sTime = date("H:i:s");
$ip = getRealIpAddr();   

// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['Lemail']);
$result = $mysqli->query("SELECT * FROM korisnici WHERE email='$email'");

if ( $result->num_rows == 0){ // User doesn't exist
    $_SESSION['message'] = "Korisnik s tim emailom ne postoji!";
    header("location: index.php#ulaznice");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['pass'], $user['lozinka']) && $user['aktivan']=='1') {
            
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['ime'];
        $_SESSION['surname'] = $user['prezime'];
        $_SESSION['aktivan'] = $user['aktivan'];
        $_SESSION['avatar'] = $user['slika'];
        $_SESSION['ID'] = $user['id'];
        $d = $_SESSION['ID'];

        $sql = "UPDATE korisnici SET zadnja_prijava_datum='$today', zadnja_prijava_time='$sTime', IP_adresa='$ip' WHERE id='$d'";
        $mysqli->query($sql);


        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['message'] = "Uspješna prijava!";
        header("location: index.php#ulaznice");
    }
    else {
        if($user['aktivan']=='0'){
            $_SESSION['message'] = "Korisnik s tim email-om ne postoji!";
            header("location: index.php#ulaznice");
        }
        else{
            $_SESSION['message'] = "Krivo unešena lozinka. Ponovite unos!";
        header("location: index.php#ulaznice");
        }
    }
}

/* IP adresa trenutnog računala */
function getRealIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


