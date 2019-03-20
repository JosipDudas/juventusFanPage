<?php
    require 'db.php';
    $mysqli->set_charset($znakovi);

    if (isset($_SESSION['ID'])) {
        	$sql = "SELECT ID_slike, path, slikaText FROM slike WHERE ID_korisnika='$id' ORDER BY ID_slike DESC";
        //$result = mysqli_result object
        $result = $mysqli->query( $sql ); 
        while( $row = $result->fetch_assoc() ){ 
            echo "<div class='omMojeSlike' oclick='openSlika();'><p class='opSlike'>".$row['slikaText']."</p><img id='uSlike' ".$row['path']."' class='userList' src='".$row['path']."' style='width:100%'>";?>
            <a id="izbrisii" href="delete.php?id=<?php echo $row['ID_slike']; ?>">Izbriši sliku</a><?php echo "</div>";
        }
    }
?>