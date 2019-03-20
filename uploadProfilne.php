<?php

$email=$_SESSION['email'];
$avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
if (preg_match("!image!",$_FILES['avatar']['type'])) 
{         
    //copy image to images/ folder 
    if (copy($_FILES['avatar']['tmp_name'], $avatar_path)) 
    {
        $_SESSION['avatar'] = $avatar_path;
        $sql = "UPDATE korisnici SET slika='$avatar_path' WHERE email='$email'";
    }
    if ($mysqli->query($sql) === true)
    {
        header("location: index.php#ulaznice");
    }
}

?>