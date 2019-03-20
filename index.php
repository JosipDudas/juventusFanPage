<?php
    require 'db.php';
    session_start();
    //provjera da li je napravljena sesija s ključem "avatar" - profilna slika te spremanje u $avatar
    if (isset($_SESSION['avatar'])){
        $avatar=$_SESSION['avatar'];
    }
    //provjera da li je napravljena sesija s ključem "ID" te spremanje u $id
    if (isset($_SESSION['ID'])){
        $id=$_SESSION['ID'];
    }
?>

<!DOCTYPE html5> 
<!-- doctype - oznacava koju verziju html koristimo (html5 u ovom slucaju) -->
<html>
	<head>
	<!-- head - sve background informacije o web stranici -->
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.30, maximum-scale=1" />
    <title> Juventus Fan Page </title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" media='screen and (max-device-width: 700px)' href="css/smartphone.css" />
    <script src="javascript/java.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script src="javascript/jq.js"></script>
	</head>
	
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['login'])) { //korisnik logging in

            require 'login.php';
            
        }
        
        elseif (isset($_POST['register'])) { //korisnik registering
            
            require 'register.php';
            
        }
        elseif (isset($_POST['reset'])) { //korisnik reset 
            
            require 'forgot.php';
            
        }
        elseif (isset($_POST['slikaa'])) { //slika uploud

            require 'uploadProfilne.php';

        }
        elseif (isset($_POST['slikee'])) { //slike uploud

            require 'uploadSlike.php';

        }
        elseif (isset($_POST['promjena'])) { //promjena podataka

            require 'changeData.php';     

        }
    }
    ?>

	<body>
    <header id="naslovnicaID">
        <!-- navigacija samo za PC-->
        <nav class="navigacija">
            <ul>
                <li><a class="nav" href="#naslovnicaID">JUVENTUS</a></li>
                <li><a class="nav" href="#povijest">POVIJEST</a></li>
                <li><a class="nav" href="#novo">NOVOSTI</a></li> 
                <li><a class="nav" href="#mom">MOMČAD</a></li>
                <li><a class="nav" href="#utakmice">UTAKMICE</a></li>
                <li><a class="nav" href="#ulaznice">ČLANSTVO</a></li>
                <?php
                    if(isset($_SESSION['aktivan'])){
                        echo "<li><a class='nav' href='#fanovi'>FANOVI</a></li>";
                    }
                ?>
                <li><a href="#video">VIDEO</a></li>
                <?php
                    if(isset($_SESSION['aktivan'])){
                        echo "<li><a class='nav' href='logout.php'>ODJAVA</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>
    
    <!-- Smartphone navigacija -->
    <div class="naslovnica">
        <div class="naslovMob">
            <div id="mennu" onclick="openMenu();">
                <div class="hamburger"></div>
                <div class="hamburger"></div>
                <div class="hamburger"></div>
            </div>
        </div>
            <nav id="navigacijaMob" hidden>
                <ul>
                    <li><a class="nav" href="#naslovnicaID" onclick="openMenu();">JUVENTUS</a></li>
                    <li><a class="nav" href="#povijest" onclick="openMenu();">POVIJEST</a></li>
                    <li><a class="nav" href="#novo" onclick="openMenu();">NOVOSTI</a></li> 
                    <li><a class="nav" href="#mom" onclick="openMenu();">MOMČAD</a></li>
                    <li><a class="nav" href="#utakmice" onclick="openMenu();">UTAKMICE</a></li>
                    <li><a class="nav" href="#ulaznice" onclick="openMenu();">ČLANSTVO</a></li>
                    <?php
                        if(isset($_SESSION['aktivan'])){
                            echo "<li><a class='nav' href='#fanovi' onclick='openMenu();'>FANOVI</a></li>";
                        }
                    ?>
                    <li><a href="#video" onclick="openMenu();">VIDEO</a></li>
                    <?php
                        if(isset($_SESSION['aktivan'])){
                            echo "<li id='odjava'><a class='nav' href='logout.php'>ODJAVA</a></li>";
                        }
                    ?>
                </ul>
            </nav>
    </div>

    <!-- Povijest kluba -->
    <div id="povijest">
        <header class="dio_naslov">
            <h2 id="pov"> POVIJEST </h2>
        </header>
		<div id="povOkvir">
			<div id="osnovniPodaci">
				<h4>Osnovni podaci</h4>
				<p>Osnovan: 1897. godine</p>
				<p>Nadimci: Bianconeri (bijelo-crni), Vecchia signora (Stara dama)</p>
				<h5>Osvojena UEFA natjecanja (drugoplasirani u zagradama):</h5>
				<ul>
					<li>• UEFA Liga prvaka: 1985, 1996, (1973), (1983), (1997), (1998), (2003)</li>
					<li>• Kup UEFA: 1977, 1990, 1993; (1995)</li>
					<li>• Kup pobjednika kupova: 1984</li>
					<li>• UEFA Super kup: 1984, 1996</li>
				</ul>
				<p></p>
				<h5>Osvojena domaća natjecanja (zadnje titule u zagradama):</h5>
				<ul>
					<li>• Seria A: 29 (2003)</li>
					<li>• Talijanski kup: 9 (1995)</li>
				</ul>
			</div>
			<div id="povTekst">
				<h4>Povijest Juventusa ukratko</h4>
				<p>Juventus su osnovali studenti Massimo d'Azeglio škole u Torinu. Nakon početnih ružičasto-crnih dresova juve uskoro prelazi na crno-bijele pruge nakon narudžbe 
				dresova iz engleske firme koja je tada proizvodila opremu za Notts County fc. u novim dresovima Juventus osvaja svoje prvo domaće prvenstvo 1905. godine.</p>
				<p>Godine 1923. obitelj Agnelli, osnivači auto tvrtke Fiat, preuzimaju klub, a Eduardo Agnelli je imenovan predsjednikom. Juventus je postao nogometna sila, 
				jer tada osvajaju pet uzastopnih nacionalnih naslova od 1930.-1935. pod trenerom Carlom Carcanom. Dominacija se nastavila i nakon rata s Ivanom i Carl Hansenom, 
				Johnom Charlesom i Omarom Sívorijem, a posljednji par je najviše zaslužan skupa s lokalnim heroj Giampierom Bonipertijem da Juve u periodu od 1957.-1958. 
				postane prvi talijanski klub koji osvaja deset prvenstava (scudetta).</p>
				<p>Pobjeda nad Athleticom 1977. godine u finalu Kupa Uefa donosi Juventusu prvi Europski trofej, a prava uzbuđenja tek slijede u 80-ima. uz Paola Rossija, 
				Michela Platinija, te Zbigniew Bonieka, Juve nastavlja s dominacijom u domaćem prvenstvu, a 1984. godine osvaja kup pobjednika kupova, te naslov Europskog prvaka
				1985. godine, iako je ovaj trofej ostao u sjeni tragedije u Heyselu nakon nereda na stadionu.</p>
				<p>Godine 1990. Juventus seli sa stadiona Comunale na tada novoizgrađeni delle Alpi. u sezoni 1994/95. osvajaju ponovno serie A, a samo dvanaest mjeseci kasnije, 
				nakon boljeg izvođenja jedanaesteraca protiv afc Ajaxa ponovno osvajaju ligu prvaka na čelu sa Marcellom Lippijem.</p>
				<p>Nakon toga gube tri europska finala, a uskoro nastupa i jedan od većih (ako ne i najveći) skandala u povijesti nogometa gdje Juventus, u nikad dokazanoj aferi, 
				biva izbačen u drugu talijansku ligu (serie B) po prvi put u svojoj povijesti 2006. godine. predvođeni bivšim veznim igračem Didier Deschampsom Juve se odmah iduće
				godine vraća u prvu ligu. od 2006. godine ponovno igraju na Comunale stadionu, poznatijem danas kao stadio Olimpico, da bi se u sezoni 2011/2012 preselili na 
				novoizgrađeni Juventus stadium, čija je izgradnja iznosila 120 milijuna eura. </p>
				<p>Juventus tako postaje jedini klub u Italiji koji ima vlastiti stadion. Na početku te sezone trenersko mjesto preuzima nekadašnji kapetan Antonio Conte koji 
				uvodi novi stil igre, izmjenjujući sustave 4-3-3 i 3-5-2. pressing, brze izmjene i visoki ritam oružja su koja donose naslov prvaka na kraju sezone, a ekipa u 
				38 kola ne zabilježava niti jedan poraz. Svakako treba izdvojiti čeličnu obranu s Barzagliem, Bonucciem i Chielliniem, dok Pirlo, Vidal i Marchisio u veznom redu 
				pokazuju svu svoju vrhunsku kvalitetu. na kraju sezone, nakon što je donio odlučujuće bodove za scudetto, oprašta se, protiv svoje volje, klupska legenda 
				Alessandro del Piero, koji seli u fc Sidney.</p>
				<p>Početak sezone 2012-2013 donosi novu aferu, talijansko sportsko pravosuđe odlučuje suspendirat trenera Contea na 4 mjeseca zbog kladioničarske afere u 
				kojoj nije sudjelovao. conte je osudjen bez jednog jedinog dokaza. Unatoč takvom hendikepu, Juventus uspjeva uzeti jesenski naslov i izboriti prolaz u osminu 
				finala lige prvaka sa prvim mjestom u skupini. što se igračkog kadra tiče nova lica u svlačionici su povratnik Giovinco, Mauricio Isla, Kwadwo Asamoah i Lucio. 
				Ovaj zadnji raskida ugovor nakon prvog djela sezone. Ali pravo pojačanje je svakakao povratak Antonia Contea na klupu, s njim pohod na talijanski i europski tron 
				može započeti...</p>
				<h4>Klubski rekordi:</h4>
				<ul>
					<li>• Najviše nastupa: Alessandro del Piero (632)</li>
					<li>• Najviše golova: alessandro del piero (273)</li>
					<li>• Rekordna pobjeda: juventus - cento 15:0  (talijanski kup, 6. siječnja 1927.)</li>
					<li>• Najveći poraz: torino - juventus 8:0 (domaće prvenstvo, 17. studenoga 1912.)</li>
				</ul>
				<p></p>
				<h4>Klupski rekordi (uefa natjecanja):</h4>
				<ul>
					<li>• Rekordna pobjeda: Juventus - Valur 7:0 (17/09/1986)</li>
					<li>• Najveći poraz: Wien Beč - Juventus 7:0 (10/01/1958)</li>
					<li>• Nastupi u ligi prvaka: 26</li>
					<li>• Nastupi u kupu pobjednika kupova: 4</li>
					<li>• Nastupi na eusa kupu: 3</li>
					<li>• Nastupi u uefa super kupu: 2</li>
					<li>• Nastupi u uefa europskoj ligi: 13</li>
					<li>• Nastupi u uefa intertoto kupu: 1</li>
					<li>• Igrač s najviše nastupa (uefa): Alessandro del Piero (129)</li>
					<li>• Top strijelci u uefa klupskim natjecanjima: Alessandro del Piero (53)</li>
				</ul>
				<p>(preuzeto sa uefa.com)</p>
			</div>
		</div>
    </div>

    <!-- Novosti - članci -->
    <div id="novo" class="novosti">
        <!-- Svi članci obavijeni div-om sectio s time da prvi mora biti id dok ostali class sectio -->
        <div class="clanci">
            <div id="sectio">
                <article class="article">
                    <div>
                        <h2 class="naslov">Veliki Juventusov posao: Bez odštete doveo sjajnog igrača</h2>
                        <img src="images/h_54427102.jpg" alt="Emre Can"  width="100%">
                        <p class="podnaslov">JUVENTUSOVA uprava ponovno je, nogometnim rječnikom, dokazala klasu.</p>
                     </div>
                     <p>
                        &emsp; Nakon što je prethodnih godina bez transferne odštete potpisivalo ugovore s Fernandom Llorenteom i Samijem Khedirom, 
                        Danijem Alvesom i Fabijom Cannavarom (2009. godine) te Andreom Pirlom i Paulom Pogbom, Juventusovo rukovodstvo službeno 
                        je priopćilo kako će i Emre Can biti transferiran bez naknade.
                        Emre Can, prema vokaciji defenzivni veznjak, s talijanskim klubom parafirat će petogodišnji ugovor. Godišnja platna 
                        primanja nisu otkrivena. Tijekom današnjeg dana pristigao je u Torino kako bi bio podvrgnut medicinskim pregledima.
                    </p>
                    <blockquote class="twitter-tweet" data-lang="hr">
                        <p lang="es" dir="ltr">Visite concluse al 
                        <a href="https://twitter.com/hashtag/JMedical?src=hash&amp;ref_src=twsrc%5Etfw">#JMedical</a> per 
                        <a href="https://twitter.com/hashtag/EmreCan?src=hash&amp;ref_src=twsrc%5Etfw">#EmreCan</a>! 
                        <a href="https://t.co/KdLdInhbrO">pic.twitter.com/KdLdInhbrO</a></p>&mdash; JuventusFC (@juventusfc) 
                        <a href="https://twitter.com/juventusfc/status/1009756682069729280?ref_src=twsrc%5Etfw">21. lipnja 2018.</a>
                    </blockquote>
                    <p>
                        &emsp; Posljednje četiri godine nastupao je za Liverpool. Engleski klub otkupio ga je početkom srpnja 2014. godine od Bayer 
                        Leverkusena za 12 milijuna eura. Unatoč naporima klupskog vodstva, povremeni njemački reprezentativac odbio je ugovorno 
                        produljenje. Iako tržišno vrijedan 30 milijuna eura, Liverpool je napustio bez odštete.
                        U prošlosti je još nastupao za Bayern München s kojim je osvojio četiri trofeja, uključujući i Ligu prvaka.
                    </p>
                    <footer class="write">
                        - napisao K. A.
                    </footer>
                </article>
            </div>

            <div class="sectio">
                <article class="article">
                    <div>
                        <h2 class="naslov">Real u Rim sa 230 mil. €, ali otac srpske zvijezde otkrio: Moj sin ne ide u Real, Juve je idealan za njega!</h2>
                        <img src="images/sms.jpg" alt="Sergej Milinković Savić"  width="100%">
                        <p class="podnaslov">On je mješavina Zidanea i Ibrahimovića, rekao je otac Sergeja Milinkovića-Savića, čije bi dovođenje moglo koštati oko 120 milijuna eura</p>
                     </div>
                     <p>
                        &emsp; Srpski reprezentativac Sergej Milinković-Savić nalazi se na radaru nekoliko vrhunskih klubova, a najzagriženiji su zasad Real Madrid i Juventus.
                        Predsjednik Lazija Claudio Lotito ne pristaje na cifru manju od 120 milijuna eura, a to je zasad bilo previše za Juventus koji u zamjenu nudi hrvatskog reprezentativca Marka Pjacu i talijanskog stopera Danielea Ruganija, dok kraljevskom klubu ne predstavlja problem 'odriješiti kesu'.
                        Otac Lazijevog veznjaka Nikola Milinković međutim smatra kako je idealna nova destinacija za njegovog sina ipak torinska momčad.
                    </p>
                    <footer class="write">
                        - napisao GOAL.COM
                    </footer>
                </article>
            </div>
            
            <div class="sectio" hidden>
                <article class="article">
                    <div>
                        <h2 class="naslov">Transferi: Juve ne da Pjacu, Real dovodi wunderkinda, Mikulić potpisao za Hajduk</h2>
                        <img src="images/pjaca.jpg" alt="Marko Pjaca"  width="100%">
                        <p class="podnaslov">Higuain na prodaju, Kalinić u Sevillu, De Gea želja Lopeteguija, Milan po Renata Sanchesa, Xhaka potpisao novi ugovor s Arsenalom</p>
                     </div>
                     <p>
                        &emsp; Juventus je jasno dao do znanja Valenciji kako za Joaa Cancela ne misli dati Marka Pjaca. Tuttosport tvrdi kako se, usprkos tome, još ne zna hoće li hrvatski 
                        napadač ostati u staroj dami ili otići na novu posudbu.
                    </p>
                    <footer class="write">
                        - napisao GOAL.COM
                    </footer>
                </article>
            </div>

            <div class="sectio" hidden>
                <article class="article">
                    <div>
                        <h2 class="naslov">Mandžukić se vraća u prvih 11, Allegri poručio: Real nas je samo ranio, još smo živi!</h2>
                        <img src="images/mario.jpg" alt="Mario mandžukić"  width="100%">
                        <p class="podnaslov">Ne treba nam pomlađivanje momčadi, nego još jedan odlično odrađen prijelazni rok! A o svojoj budućnosti ne razmišljam, kaže Allegri</p>
                    </div>
                    <p>
                        &emsp; Juventus je prošlog utorka doživio težak poraz protiv Real Madrida (0:3) u Ligi prvaka, a sada će vidati rane protiv posljednjeplasiranog
                        Beneventa (subota, 15:00). Dobra vijest za sve navijače stare dame, ali i hrvatske reprezentacije, jest oporavak Marija Mandžukića koji bi
                        mogao dobiti priliku od prve minute:
                    </p>
                    <p>
                        &emsp; "Svi su spremni za igru, osim Barzaglija i Bernardeschija. Vjerojatno će Mandžukić i Cuadrado zaigrati od početka. Pred nama je još puno
                        utakmica, pa nećemo riskirati ni s kime kako bismo na kraju sezone sve imali na raspolaganju", rekao je Max Allegri pa najavio nadolazeći
                        prijelazni rok:
                    </p>
                    <p>
                        &emsp; "Nakon finala u Berlinu prije tri godine, promijenili smo devet prvotimaca, a sada imamo deset igrača u momčadi koji su rođeni između 1990.
                        i 1997. godine. To potvrđuje da nam ne treba pomlađivanje momčadi, nego još jedan odlično odrađen prijelazni rok!"
                    </p>
                    <p>
                        &emsp; "Sada moramo misliti na ligu, kup i Ligu prvaka u kojoj smo ranjeni, ali ne i ubijeni! A kada je moja budućnost u pitanju,
                        moram priznati da ne razmišljam o njoj, nego samo o sadašnjosti."
                    </p>
                    <footer class="write">
                        - napisala Lorena Majcen
                    </footer>
                </article>
            </div>

            <!-- Gumb za prikaz više vijesti preko funkcije u jq-u uz pomoč class=sectio-->
            <div id="vise">
                <input id="btnClick" type="button" value="Još vijesti"/>
            </div>

        </div>
    </div>

    <!-- Momčad po pozicijama i slikama igrača -->
    <div id="mom" class="momcad">
        <header class="momcad_naslov">
            <h2 id="nazad" onclick="openPozicija(0);"> MOMČAD </h2>
        </header>
        <!-- Prikaz pozicija u obliku tabele -->
        <div id="poz" class="pozicija">
            <table>
                <tr>
                    <th class="zoom" onclick="openPozicija(1);">STRUČNI STOŽER</th>
                    <th class="zoom" onclick="openPozicija(2);">GOLMAN</th>
                    <th class="zoom" onclick="openPozicija(3);">OBRANA</th>
                    <th class="zoom" onclick="openPozicija(4);">VEZNI RED</th>
                    <th class="zoom" onclick="openPozicija(5);">NAPAD</th>
                </tr>
            </table>
        </div>
        <!-- Prikaz stručnog stožera -->
        <div id="strucni" class="strucni_stozer" hidden>
            <header class="naslovi">
                <h3> STRUčNI STOŽER </h3>
            </header>
            <div id="stozer_pozition">
                <div class="container_stozer">
                    <img id="stozer" class="zoomIgraci" src="images/alegri.png">
                    <div class="overlay">Massimiliano Allegri</div>
                </div>
            </div>
        </div>
        <!-- Prikaz golmana -->
        <div id="golman" class="golmani" hidden>
            <header class="naslovi">
                <h3> GOLMANI </h3>
            </header>
                <div id="golman_position">
                    <div class="container_golmani">
                        <img id="stozer" class="zoomIgraci" src="images/buffon.png">
                        <div class="overlay">Gianluigi Buffon</div>
                    </div>
                    <div class="container_golmani">
                        <img id="stozer" class="zoomIgraci" src="images/scezny.png">
                        <div class="overlay">Wojciech Szczęsny</div>
                    </div>
                    <div class="container_golmani">
                        <img id="stozer" class="zoomIgraci" src="images/pinsoglio.png">
                        <div class="overlay">Carlo Pinsoglio</div>
                    </div>
                </div>
        </div>
        <!-- Prikaz obrane -->
        <div id="obran" class="obranaa" hidden>
            <header class="naslovi">
                <h3> OBRANA </h3>
            </header>
            <div id="obrana">
                <a class="prev" onclick="plusSlidesO(-1)">&#10094;</a>
                <div class="container_obrana">
                    <img id="stozer" class="zoomIgraci" src="images/barzagli.png">
                    <div class="overlay">Andrea Barzagli</div>
                </div>
                <div class="container_obrana">
                    <img id="stozer" class="zoomIgraci" src="images/benattia.png">
                    <div class="overlay">Mehdi Benatia</div>
                </div>
                <div class="container_obrana">
                    <img id="stozer" class="zoomIgraci" src="images/chiellini.png">
                    <div class="overlay">Giorgio Chielini</div>
                </div>
                <a class="next" onclick="plusSlidesO(1)">&#10095;</a>
            </div>

            <div id="obrana2">
                <a class="prev" onclick="plusSlidesO(-1)">&#10094;</a>
                <div class="container_obrana">
                    <img id="stozer" class="zoomIgraci" src="images/sandro.png">
                    <div class="overlay">Alex Sandro</div>
                </div>
                <div class="container_obrana">
                    <img id="stozer" class="zoomIgraci" src="images/de.png">
                    <div class="overlay">Matia De Sciglio</div>
                </div>
                <div class="container_obrana">
                    <img id="stozer" class="zoomIgraci" src="images/howedes.png">
                    <div class="overlay">Benedikt Höwedes</div>
                </div>
                <a class="next" onclick="plusSlidesO(1)">&#10095;</a>
            </div>

            <div id="obrana3">
                <a class="prev" onclick="plusSlidesO(-1)">&#10094;</a>
                <div class="container_obrana">
                    <img id="stozer" class="zoomIgraci" src="images/rugani.png">
                    <div class="overlay">Daniele Rugani</div>
                </div>
                <div class="container_obrana">
                    <img id="stozer" class="zoomIgraci" src="images/lihstainer.png">
                    <div class="overlay">Stephan Lichtsteiner</div>
                </div>
                <a class="next" onclick="plusSlidesO(1)">&#10095;</a>
            </div>

        </div>
        <!-- Prikaz veze -->
        <div id="veza" class="vezza" hidden>
            <header class="naslovi">
                <h3> VEZNI RED </h3>
            </header>
            <div id="vezni_red" class="fade">
                <a class="prev" onclick="plusSlidesV(-1)">&#10094;</a>
                <div class="container_veza">
                    <img id="stozer" class="zoomIgraci" src="images/marchisio.png">
                    <div class="overlay">Claudio Marchisio</div>
                </div>
                <div class="container_veza">
                    <img id="stozer" class="zoomIgraci" src="images/pjanic.png">
                    <div class="overlay">Miralem Pjanić</div>
                </div>
                <div class="container_veza">
                    <img id="stozer" class="zoomIgraci" src="images/kedira.png">
                    <div class="overlay">Sami Khedira</div>
                </div>
                <a class="next" onclick="plusSlidesV(1)">&#10095;</a>
            </div>

            <div id="vezni_red2" class="fade">
                <a class="prev" onclick="plusSlidesV(-1)">&#10094;</a>
                <div class="container_veza">
                    <img id="stozer" class="zoomIgraci" src="images/matuidi.png">
                    <div class="overlay">Bleise Matuidi</div>
                </div>
                <div class="container_veza">
                    <img id="stozer" class="zoomIgraci" src="images/asamoa.png">
                    <div class="overlay">Kwadwo Asamoah</div>
                </div>
                <div class="container_veza">
                    <img id="stozer" class="zoomIgraci" src="images/tenk.png">
                    <div class="overlay">Stefano Sturaro</div>
                </div>
                <a class="next" onclick="plusSlidesV(1)">&#10095;</a>
            </div>

            <div id="vezni_red3" class="fade">
                <a class="prev" onclick="plusSlidesV(-1)">&#10094;</a>
                <div class="container_veza">
                    <img id="stozer" class="zoomIgraci" src="images/bentankur.png">
                    <div class="overlay">Rodrigo Bentancur</div>
                </div>
                <a class="next" onclick="plusSlidesV(1)">&#10095;</a>
            </div>
        </div>
        <!-- Prikaz napada -->
        <div id="nap" class="napp" hidden>
            <header class="naslovi">
                <h3> NAPAD </h3>
            </header>
            <div id="napad" class="fade">
                <a class="prev" onclick="plusSlidesN(-1)">&#10094;</a>
                <div class="container_napad">
                    <img id="stozer" class="zoomIgraci" src="images/joja.png">
                    <div class="overlay">Paulo Dybala</div>
                </div>
                <div class="container_napad">
                    <img id="stozer" class="zoomIgraci" src="images/mandzukic.png">
                    <div class="overlay">Mario Mandžukić</div>
                </div>
                <div class="container_napad">
                    <img id="stozer" class="zoomIgraci" src="images/pipita.png">
                    <div class="overlay">Gonzalo Higuain</div>
                </div>
                <a class="next" onclick="plusSlidesN(1)">&#10095;</a>
            </div>

            <div id="napad2" class="fade">
                <a class="prev" onclick="plusSlidesN(-1)">&#10094;</a>
                <div class="container_napad">
                    <img id="stozer" class="zoomIgraci" src="images/bernardesci.png">
                    <div class="overlay">Federico Bernardeschi</div>
                </div>
                <div class="container_napad">
                    <img id="stozer" class="zoomIgraci" src="images/cuardado.png">
                    <div class="overlay">Juan Cuadrado</div>
                </div>
                <a class="next" onclick="plusSlidesN(1)">&#10095;</a>
            </div>
        </div>

    </div>	

    <!-- Odigrane i nadolazeće utakmice Juventusa -->
    <div id="utakmice">
        <header class="dio_naslov">
            <h2 id="utak"> UTAKMICE </h2>
        </header>
        <div id="omotac_utakmice">
            <!-- Odigrane utakmice -->
            <div id="omotac_gotove">
                <?php
                    require("db.php");

                    $mysqli->set_charset($znakovi);
                    
                    /* Dohvačaju se utakmice iz tablice utakmice gdje je odigrana postavljena na DA */
                    $sql = "select domacin, gost, domaci_golovi, gosti_golovi, datum_odrzavanja, vrijeme_odrzavanja, mjesto FROM utakmice WHERE odigrana='DA' ";

                    $rs = $mysqli->query($sql);
                    if (!$rs) {
                        echo "Problem kod upita na bazu podataka!";
                        exit;
                    }

                    while (list($domaci, $gosti, $domaci_golovi, $gosti_golovi, $datum, $vrijeme, $mjesto) = $rs->fetch_array()) {
                        /* Datum i vrijeme se parsaju i formatiraju */
                        $datum = date('d.m.Y',strtotime($datum));
                        $vrijeme = date('H:i', strtotime($vrijeme));

                        print "<div class='prva'>\n";
                        print "<p><strong>$datum $vrijeme $mjesto - </strong>$domaci $domaci_golovi : $gosti_golovi $gosti</p>";
                        print "</div>\n";
                    }    

                    $rs->close();
                    $mysqli->close();
                ?>
            </div>
            <div id="razmak">
            </div>
            <!-- Nadolazeće utakmice -->
            <div id="omotac_nadolazece">
            <?php
                    require("db.php");

                    $mysqli->set_charset($znakovi);

                    /* Dohvačaju se utakmice iz tablice utakmice gdje je odigrana postavljena na NE */
                    $sql = "select domacin, gost, domaci_golovi, gosti_golovi, datum_odrzavanja, vrijeme_odrzavanja, mjesto FROM utakmice WHERE odigrana='NE' ";

                    $rs = $mysqli->query($sql);
                    if (!$rs) {
                        echo "Problem kod upita na bazu podataka!";
                        exit;
                    }

                    while (list($domaci, $gosti, $domaci_golovi, $gosti_golovi, $datum, $vrijeme, $mjesto) = $rs->fetch_array()) {
                        /* Datum i vrijeme se parsaju i formatiraju */
                        $datum = date('d.m.Y',strtotime($datum));
                        $vrijeme = date('H:i', strtotime($vrijeme));

                        print "<div class='prva'>\n";
                        print "<p><strong>$datum $vrijeme $mjesto - </strong>$domaci $domaci_golovi : $gosti_golovi $gosti</p>";
                        print "</div>\n";
                    }    

                    $rs->close();
                    $mysqli->close();
                ?>
            </div>
        </div>
    </div>

    <!-- Članstvo tj. korisnički račun na Fan Page-u-->
    <div id="ulaznice">
        <header class="dio_naslov">
            <h2> ČLANSTVO </h2>
            <div id="greska" class="alert alert-error"> 
                <?php
                    if (isset($_SESSION['message'])){
                         echo $_SESSION['message']; 
                        }
                ?>
            </div>
        </header>
        <!-- Prijava na web stranicu -->
        <div id="login">
            <form action="index.php" method="post" autocomplete="on">
                <div class="slika">
                    <img src="images/avatar.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="use"><b>E-mail</b></label>
                    <input id="use" type="email" placeholder="Unesite e-mail" name="Lemail" required>

                    <label for="pass"><b>Lozinka</b></label>
                    <input id="pass" type="password" autocomplete="off" placeholder="Unesite lozinku" name="pass" required>
                        
                    <button type="submit" name="login">Prijava</button>
                    <label id="lozinka">
                    <a id="zabLozinka" onclick="reg(2);" style="color:white">Zaboravili ste lozinku?</a>
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" class="cancelbtn" onclick="obrisi(1);">Odbaci</button>
                    <button type="button" class="reg" onclick="reg(1);">Registracija</button>
                    <!-- <span class="psw">Da li ste zaboravili <a href="#">lozinku?</a></span> -->
                </div>
            </form>
        </div>
        <!-- Registracija na web stranicu -->
        <div id="registration" hidden>
            <form action="index.php" method="post" autocomplete="off" accept-charset="utf-8">
                <div class="container">
                    <label for="rname"><b>Ime</b></label>
                    <input id="rname" type="text" placeholder="Unesite ime" name="name" required>

                    <label for="rsurname"><b>Prezime</b></label>
                    <input id="rsurname" type="text" placeholder="Unesite prezime" name="surname" required>

                    <label for="email"><b>E-mail</b></label>
                    <input id="email" type="email" placeholder="Unesite e-mail" name="email" required>

                    <label for="regpass"><b>Lozinka</b></label>
                    <input id="regpass" type="password" minLength="6" placeholder="Unesite lozinku" name="psw" required>

                    <label for="rpass"><b>Ponovite lozinku</b></label>
                    <input id="rpass" type="password" placeholder="Ponovite lozinku" name="rpsw" required>
                        
                    <button type="submit" name="register">Registracija</button>
                    <p>Kreiranjem korisničkog računa slažete se sa <a id="uvjeti" onclick="openUvjeti(1);" style="color:dodgerblue">Uvjetima</a>.</p>
                    <div id="prikazUvjeta" onclick="openUvjeti(2);">
                        <div id="uvjet">
                            <h3>Pravne napomene</h3>
                            <p>Sadržaj na web stranicama JuventusFanPage.hr zaštićen je autorskim pravima. Neovlašteno korištenje bilo kojeg 
                                dijela web stranice JuventusFanPage.hr, bez dozvole vlasnika autorskih prava, smatra se kršenjem autorskih 
                                prava i podložno je tužbi. Dokumenti, podaci i informacije objavljeni na web stranicami JuventusFanPage ne 
                                smiju se reproducirati, distribuirati ili na bilo koji način koristiti u komercijalne svrhe bez izričitog 
                                pristanka J.D. Dokumenti, podaci i informacije objavljeni na ovim web stranicama mogu se koristiti samo za 
                                individualne potrebe korisnika uz poštivanje svih autorskih i vlasničkih prava te prava trećih osoba.</p>
                            <p>Korištenjem sadržaja ovih web stranica korisnik prihvaća sve rizike koji nastaju iz korištenja ovih web 
                                stranica te prihvaća koristiti sadržaj ovih web stranica isključivo za osobnu uporabu i na vlastitu odgovornost. 
                                J.D. se u potpunosti odriče svake odgovornosti koja na bilo koji način može nastati iz, ili je na bilo koji 
                                način vezana za korištenje ovih web stranica, za bilo koje radnje korisnika uporabom ili zlouporabom sadržaja 
                                ovih web stranica, te za bilo kakvu štetu koja može nastati korisniku ili bilo kojoj trećoj strani u vezi s 
                                uporabom ili zlouporabom korištenja sadržaja ovih web stranica.</p>
                            <p> J.D. može prikupljati osobne podatke korisnika, kao što su ime, adresa, ili e-mail adresa samo ako iste korisnik dobrovoljno registrira na stranici. J.D. će navedene podatke
                                koristiti isključivo u svrhu što boljeg uvida i razumijevanja pojedinačnih potreba i zahtjeva korisnika kao 
                                i razvijanja mogućnosti što kvalitetnijeg pružanja svih usluga JuventusFanPage-a na zadovoljstvo korisnika. 
                                J.D. se obvezuje da navedene podatke neće učiniti dostupnim bilo kojoj trećoj strani bez izričitog pristanka 
                                korisnika. J.D. zadržava pravo izmjene sadržaja ovih web stranica te neće biti odgovoran ni za kakve moguće 
                                posljedice proizašle iz takvih promjena. J.D. zadržava pravo izmjene ovih uvjeta korištenja. O svakoj promjeni
                                 ovih uvjeta korištenja korisnici će biti na odgovarajući način i pravovremeno obaviješteni. 
                                 Izmjene ovih uvjeta korištenja stupaju na snagu s datumom njihove objave na web stranicama JuventusFanPage.com.</p>
                        </div>
                    </div>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" class="cancelbtn" onclick="obrisi(3);">Odbaci</button>
                    <button type="button" class="izadji" onclick="reg(3);">Prijava</button>
                    <!-- <span class="psw">Da li ste zaboravili <a href="#">lozinku?</a></span> -->
                </div>
            </form>
        </div>
        <!-- Zaboravljena lozinka -->
        <div id="loz" hidden>
            <form action="index.php" method="post" autocomplete="off">
                <div class="container">
                    <label for="uname"><b>E-mail</b></label>
                    <input id="rEmail" type="email" placeholder="Unesite e-mail" name="Lemail" required>
                        
                    <button type="submit" name="reset">Reset lozinke</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" class="cancelbtn" onclick="obrisi(2);">Odbaci</button>
                    <button type="button" class="reg" onclick="reg(3);">Prijava</button>
                    <!-- <span class="psw">Da li ste zaboravili <a href="#">lozinku?</a></span> -->
                </div>
            </form>
        </div>
        <!-- Prilikom prijave otvaranje svih mogučnosti (informacije o korisniku, slike i karte za utakmice) -->
        <div id="omotUtak" hidden>
            <!-- Osnovne informacije o korisniku -->
            <div id="profilInf">
                <form id="oPodaci" class="form" method="post" enctype="multipart/form-data" autocomplete="off" accept-charset="utf-8">
                    <h3 id="op">Podaci o korisniku</h3>
                    
                    <div class="slika" name="slikaa">
                        <img src="<?php require ("profilna.php"); ?>" alt="Avatar" class="avatar">
                    </div> 
                    
                    <div id="odabir">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Odaberi sliku
                        </label>
                        <input id="file-upload" type="file" name="avatar" accept="image/*"/>
                        <label for="file-subbmit" id="lpot">Promjeni sliku
                        <input id="file-subbmit" type="submit" value="Promjeni sliku" name="slikaa" /></label>
                    </div>    
                    <?php  
                        require 'podaci.php';
                    ?>
                    <button type="submit" name="promjena">Promjena podataka</button>;
                </form>
            </div>
            <!-- Upload slika i reyervacija karata -->
            <div id="ulaz">
                <button id="uslike">Slike</button>
                <button id="kartee">Karte</button>
                <!-- Upload slika i pregled trenutno upload-anih slika -->
                <div id="drzacSlike">
                    <h3>Slike</h3>
                    <form id="mSlike" class="form" method="post" enctype="multipart/form-data" autocomplete="off" accept-charset="utf-8">
                        <div id="mojeSlike">
                            <p>Želite li podijeliti svoje slike sa ostalim fanovima. Uplodate slike i one postaju vidljive ostalim fanovima Juventusa.</p>
                            <p>U sekciji "Slike" vidite svoje vlastite slike (možete mijenjati i uplodati nove slike), dok u sekciji "Fanovi" možete pogledati slike ostalih Juventusovih fanova</p>
                            <label for="upload" class="cus-file-upload">
                                <i class="fa fa-cloud-upload"></i> Uploud slike
                            </label>
                            <input id="upload" type="file" name="uSli" accept="image/*"/>
                            <p></p>
                            <label id="lpodaci" for="opis"><b>Opis slike: </b></label>
                            <input id="opis" type="text" maxlength="250" placeholder="Unesite opis slike" name="opisSlike" >
                            <p></p>
                            <label for="subbmit" id="uPot">Potvrda
                            <input id="subbmit" type="submit" value="Promjeni sliku" name="slikee" /></label>
                        </div> 
                    </form>
                    <div class="mySlike">
                        <?php
                            require 'mySlike.php';
                        ?>
                    </div>
                </div>
                <!-- Prikaz dostupnih karata za utakmice -->
                <div id="drzacKarata"hidden>
                    <div id="overflow">
                        <h3>Karte</h3>
                        <?php
                            if(isset($_SESSION['rezervacija'])){
                                echo "<p>".$_SESSION['rezervacija']."</p>";
                            }
                        ?>
                        <?php require 'karte.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Slike fanova koje su podijelili-->
    <?php
        if(isset($_SESSION['aktivan'])){
            echo "<div id='fanovi'>";
        }
        else{
            echo "<div id='fanovi' hidden>";
        }
    ?>
        <header class="dio_naslov">
            <h2 id="fan"> FANOVI </h2>
        </header>
        <div class="omoFans">
            <div class="fans">
                <div class='omFanSlike'>
                <?php
                    require 'db.php';
                    $mysqli->set_charset($znakovi);
                    if (isset($_SESSION['ID'])) {
                        $sqll = "SELECT count(*) AS broj FROM slike WHERE NOT ID_korisnika='$id'";
                        $resultt = $mysqli->query( $sqll );
                        $roww = $resultt->fetch_row();
                        $broj = $roww[0];
                        $broj = $broj/2;
                        $broj = intval($broj);
                        $sql = "SELECT slike.ID_slike, slike.path, slike.slikaText, korisnici.ime, korisnici.prezime, korisnici.slika FROM slike, korisnici WHERE slike.ID_korisnika=korisnici.id AND NOT slike.ID_korisnika='$id' ORDER BY ID_slike ASC LIMIT $broj";

                        //$result = mysqli_result object
                        $result = $mysqli->query( $sql ); 
                        while( $row = $result->fetch_assoc() ){
                            $pat = $row['path'];
                            $slika = $row['slika'];
                            echo "<p class=opSlike> <img class='logo' src='$slika' /> &emsp;".$row['ime']." ".$row['prezime'].": ".$row['slikaText']."</p>";
                            ?>  <img onclick="openSlika(1, '<?php echo $pat; ?>');" src="<?php echo $row['path']; ?>" style='width:100%'>
                            <?php
                        } 
                    }
                ?>
                </div>

                <div class='omFanSlike'>
                <?php
                    require 'db.php';
                    $mysqli->set_charset($znakovi);
                    if (isset($_SESSION['ID'])) {
                        $sqll = "SELECT count(*) AS broj FROM slike WHERE NOT ID_korisnika='$id'";
                        $resultt = $mysqli->query( $sqll );
                        $roww = $resultt->fetch_row();
                        $broj = $roww[0];
                        $broj = $broj/2;
                        $broj = intval($broj);

                        $sq = "SELECT slike.ID_slike, slike.path, slike.slikaText, korisnici.ime, korisnici.prezime, korisnici.slika FROM slike, korisnici WHERE slike.ID_korisnika=korisnici.id AND NOT slike.ID_korisnika='$id' ORDER BY ID_slike DESC LIMIT $broj";
                        //$result = mysqli_result object
                        $resul = $mysqli->query( $sq ); 
                        while( $row = $resul->fetch_assoc() ){
                            $pat = $row['path'];
                            echo "<p class=opSlike> <img class='logo' src='$slika' /> &emsp;".$row['ime']." ".$row['prezime'].": ".$row['slikaText']."</p>";
                            ?>  <img onclick="openSlika(1, '<?php echo $pat; ?>');" src="<?php echo $row['path']; ?>" style='width:100%'>
                            <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>
        <div id="prikazSlike" onclick="openSlika(2);">
            <img id="povecanaSlika"/>
        </div>
    <?php
    echo "</div>";   
    ?>
    
    <!-- Youtube Juventus kanal-->
    <div id="video">
        <header>
            <h2 id="kanal"> YOUTUBE KANAL </h2>
        </header>
        <div id="youtube">
            <iframe src="https://www.youtube.com/embed/?listType=user_uploads&list=juventus" width="700" height="583" allowfullscreen="allowfullscreen"></iframe>
        </div> 
    </div>

    <!-- Footer -->
    <div class="foot">
        <div id="drustveneMreze">
            <div class="razmak">
                <a href="https://twitter.com/juventusfc"><img class="tfi" src="images/twitter.png"/></a>
            </div>
            <div class="razmak">    
                <a href="https://hr-hr.facebook.com/Juventus/"><img class="tfi" src="images/face.png"/></a>
            </div>
            <div class="razmak">
                <a href="https://www.instagram.com/juventus/?hl=hr"><img class="tfi" src="images/insta.png"/></a>
            </div>
        </div>
        <footer class="page_footer">
            &copy; Copyright juventus.hr
        </footer>
    </div>
</body>	
</html>