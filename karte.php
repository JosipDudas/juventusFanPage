<?php
require 'db.php';
$mysqli->set_charset($znakovi);
$email=$_SESSION['email'];

$sql = "SELECT ID_utakmice, domacin, gost, datum_odrzavanja, vrijeme_odrzavanja, mjesto, sjever, jug, zapad, istok FROM utakmice WHERE odigrana='NE' ORDER BY datum_odrzavanja LIMIT 2";
$resul = $mysqli->query( $sql );

while( $row = $resul->fetch_assoc() ){ 
    
    $id = $row['ID_utakmice'];
    $domacin = $row['domacin'];
    $gost = $row['gost'];
    $datum = $row['datum_odrzavanja'];
    $vrijeme = $row['vrijeme_odrzavanja'];
    $mjesto = $row['mjesto'];
    $sjever = $row['sjever'];
    $jug = $row['jug'];
    $istok = $row['istok'];
    $zapad = $row['zapad'];
    $ukupno = $jug + $sjever + $zapad + $istok;
    echo "<div id='infKarte'><h3> $domacin vs. $gost $datum $vrijeme $mjesto</h3>";?>

        <?php
            if($istok==0 && $zapad==0 && $sjever==0 && $jug==0){
                echo "<h4>Nažalost nema raspoloživih karata za ovu utakmicu!</h4>";
            }
            else{
                echo "<h4>Broj raspoloživih karata: $ukupno</h4>";
                echo "<p>Zapadna tribina: $zapad</p>";
                echo "<p>Istočna tribina: $istok</p>";
                echo "<p>Sjeverna tribina: $sjever</p>";
                echo "<p>Južna tribina: $jug</p>";
                ?>
                <form class="fKarte" class="form" action="reserved.php" method="post" enctype="multipart/form-data" autocomplete="off" accept-charset="utf-8">
                    <p>Ukoliko želite rezervirati i kupiti kartu za navedenu utakmicu.</p>
                    <p>Odaberite tribinu koju želite rezervirati i potvrdite klikom na "Rezerviraj". Zatim ćemo Vas mi kontaktirati 
                        u što kraćem roku kako bi izvršili samo plaćanje.</p>
                    <label id="lpodaci" for="brKarata"><b id="l">Broj karata za rezervaciju: </b></label>
                    <input class="brKarata" type="number" min="1" max="100" value="1" name="brRezervacija" >
                    <input type="hidden" class="idUtak" type="text" value="<?php echo $id; ?>" name="idUtakmice">
                    <select class="trib" name="tribina">
                        <?php 
                            if($jug!=0){
                                echo "<option value='jug'>Južna</option>";
                            }
                            if($istok!=0){
                                echo "<option value='istok'>Istočna</option>";
                            }
                            if($zapad!=0){
                                echo "<option value='zapad'>Zapadna</option>";
                            }
                            if($sjever!=0){
                                echo "<option value='sjever'>Sjeverna</option>";
                            }
                        ?>
                    </select>
                    <br><br>
                    <button type="submit" name="rezerviraj">Rezerviraj</button>
                    </div> 
                </form>
                <?php
            }
        ?>
    </div>
    <?php
}
?>