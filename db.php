<?php
$host = 'localhost:3307';
$user = 'root';
$pass = 'root';
$db = 'juventusdb';
$znakovi = 'utf8';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>