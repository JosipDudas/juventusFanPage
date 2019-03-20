<?php  
    require 'db.php';
    $mysqli->set_charset($znakovi);
    $email=$_SESSION['email'];
    $sql = "SELECT zadnja_prijava_datum, zadnja_prijava_time FROM korisnici WHERE email='$email'";

    if ( $mysqli->query($sql) ){
        $result = $mysqli->query("SELECT ime, prezime, email, zadnja_prijava_datum, zadnja_prijava_time, mjesto, IP_adresa FROM korisnici WHERE email='$email'"); 
        $user = $result->fetch_assoc();
        $datum = $user['zadnja_prijava_datum'];
        $vrijeme = $user['zadnja_prijava_time'];
        $mjesto = $user['mjesto'];
        $ime = $user['ime'];
        $prezime = $user['prezime'];
        $email = $user['email'];
        $ip = $user['IP_adresa'];

        echo "<label id='lpodaci' for='promjenaImena'><b>Ime: </b></label>";
        echo "<input id='promjenaImena' type='text' value='$ime' name='ime'>";
        echo "<label id='lpodaci' for='promjenaPrezimena'><b>Prezime: </b></label>";
        echo "<input id='promjenaPrezimena' type='text' value='$prezime' name='prezime' >";
        echo "<label id='lpodaci' for='lemail'><b>Email: </b></label>";
        echo "<input id='lemail' type='email' value='$email' name='email' >";

        echo "<label id='lpodaci' for='promjenaMjesta'><b>Mjesto: </b></label>";
        echo "<input id='promjenaMjesta' type='text' value='$mjesto' name='mjesto' >";
                                
        echo "<label id='lpodaci'><b>Zadnja prijava (datum i vrijeme): </b></label>";
        echo "<input id='datumVrijeme' readOnly='true' type='text' value='$datum $vrijeme' name='datum' >";

        echo "<label id='lpodaci'><b>IP adresa zadnje prijave: </b></label>";
        echo "<input id='ipAdresa' readOnly='true' type='text' value='$ip' name='adresa' >";
    }
?>