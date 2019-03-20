<?php
    require 'db.php';
    session_start();

    if(isset($_POST['odabir']) && isset($_POST['id'])){
        $br = $_POST['id'];
        $max = $_POST['odabir'];
        $result = $mysqli->query("SELECT $max FROM utakmice WHERE ID_utakmice = '$br'");
        $poz = "0";
        while ($row=mysqli_fetch_row($result))
        {
            $poz = $row[0];
        }
        echo $poz;
    }

?>