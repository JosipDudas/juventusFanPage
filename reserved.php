<?php
    require "db.php";
    $mysqli->set_charset($znakovi);
    session_start();

    $idKorisnika = $_SESSION['ID'];
    $idUtakmica = $mysqli->escape_string($_POST['idUtakmice']);
    $brRezervacija = $mysqli->escape_string($_POST['brRezervacija']);
    $tribina = $mysqli->escape_String($_POST['tribina']);

    $sql = "INSERT INTO karte (broj_karata, tribina, utakmica_ID, korisnik_ID) " 
                    . "VALUES ('$brRezervacija','$tribina','$idUtakmica','$idKorisnika')";

    if ( $mysqli->query($sql) ){
        if($tribina=="sjever"){
            $sql1 = "UPDATE utakmice SET sjever=sjever-'$brRezervacija' WHERE ID_utakmice='$idUtakmica'";
            if($mysqli->query($sql1)){
                $_SESSION['rezervacija']="Rezervirali ste ".$brRezervacija." kartu/te za sjevernu tribinu.";
                header("location: index.php#ulaznice");
            }
        }
        else if($tribina=="istok"){
            $sql1 = "UPDATE utakmice SET istok=istok-'$brRezervacija' WHERE ID_utakmice='$idUtakmica'";
            if($mysqli->query($sql1)){
                $_SESSION['rezervacija']="Rezervirali ste ".$brRezervacija." kartu/te za istočnu tribinu.";
                header("location: index.php#ulaznice");
            }
        }
        else if($tribina=="zapad"){
            $sql1 = "UPDATE utakmice SET zapad=zapad-'$brRezervacija' WHERE ID_utakmice='$idUtakmica'";
            if($mysqli->query($sql1)){
                $_SESSION['rezervacija']="Rezervirali ste ".$brRezervacija." kartu/te za zapadnu tribinu.";
                header("location: index.php#ulaznice");
            }
        }
        else if($tribina=="jug"){
            $sql1 = "UPDATE utakmice SET jug=jug-'$brRezervacija' WHERE ID_utakmice='$idUtakmica'";
            if($mysqli->query($sql1)){
                $_SESSION['rezervacija']="Rezervirali ste ".$brRezervacija." kartu/te za južnu tribinu.";
                header("location: index.php#ulaznice");
            }
        }
    }

?>