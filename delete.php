<?php
require 'db.php';

$id = $_GET['id'];


$sql = "DELETE FROM slike WHERE ID_slike='$id'";

        if ( $mysqli->query($sql) ){
            header("location: index.php#ulaznice");
        }
        else{
            echo "Greška kod brisanja!";
        }