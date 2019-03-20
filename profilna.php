<?php
    require 'db.php';
    $mysqli->set_charset($znakovi);

    if (isset($_SESSION['avatar'])){
        echo "$avatar";
    }
    else{
        echo "images/avatar.png";
    }