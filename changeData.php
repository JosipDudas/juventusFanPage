<?php

require 'db.php';

$mysqli->set_charset($znakovi);

$ime = $mysqli->escape_string($_POST['ime']);
$prezime = $mysqli->escape_string($_POST['prezime']);
$email = $mysqli->escape_string($_POST['email']);
$mjesto = $mysqli->escape_string($_POST['mjesto']);
$sql = "UPDATE korisnici SET ime = '$ime', prezime = '$prezime', email = '$email', mjesto = '$mjesto' WHERE email = '$email'";

if ( $mysqli->query($sql) ) {
    header("location: index.php#ulaznice");    
}


?>