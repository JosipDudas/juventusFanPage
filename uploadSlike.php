<?php

$mysqli->set_charset($znakovi);
$slike_path = $mysqli->real_escape_string('images/'.$_FILES['uSli']['name']);
$opisSlike = $mysqli->escape_string($_POST['opisSlike']);
if (preg_match("!image!",$_FILES['uSli']['type'])) 
{         
    //copy image to images/ folder 
    if (copy($_FILES['uSli']['tmp_name'], $slike_path)) 
    {
        $sql = "INSERT INTO slike (path, ID_korisnika, slikaText) "
            ." VALUES ('$slike_path', '$id', '$opisSlike')";
    }
    if ($mysqli->query($sql) === true)
    {
        header("location: index.php#ulaznice");
    }
}

?>