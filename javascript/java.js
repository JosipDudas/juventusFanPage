/* globalne inicijalne vrijednosti varijabli pozicija za prikaz igrača. "V" - vezni red, "N"-napad, "O"-obrana*/
var brojacV = 0;
var brojacN = 0;
var brojacO = 0;

var aBrojac = 1; 

var karte = 1;

//poziva se kada se koristi smartphone i prikazuje navigaciju u obliku hamburger ikone
function openMenu(){
    if(document.getElementById("navigacijaMob").style.display=="block"){
        document.getElementById("navigacijaMob").style.display="none";
    }
    else{
        document.getElementById("navigacijaMob").style.display="block";
    }
}

//Klikom na poziciju u tabeli omogućiti prikaz pojedinih dijelova a druge onemogućiti
function openPozicija(i) {
    if (i == 0) {
        if (document.getElementById("poz").style.display = "none") {
            document.getElementById("poz").style.display = "block";
            document.getElementById("golman").style.display = "none";
            document.getElementById("strucni").style.display = "none";
            document.getElementById("obran").style.display = "none";
            document.getElementById("veza").style.display = "none";
            document.getElementById("nap").style.display = "none";
			document.getElementById("nazad").innerHTML = "MOMČAD";
        }
    }
    else if (i == 1) {
        document.getElementById("strucni").style.display = "block";
        document.getElementById("poz").style.display = "none";
		document.getElementById("nazad").innerHTML = "NAZAD";
    }
    else if (i == 2) {
        document.getElementById("golman").style.display = "block";
        document.getElementById("poz").style.display = "none";
		document.getElementById("nazad").innerHTML = "NAZAD";
    }
    else if (i == 3) {
        document.getElementById("obran").style.display = "block";
        document.getElementById("poz").style.display = "none";
		document.getElementById("nazad").innerHTML = "NAZAD";
    }
    else if (i == 4) {
        document.getElementById("veza").style.display = "block";
        document.getElementById("poz").style.display = "none";
		document.getElementById("nazad").innerHTML = "NAZAD";
    }
    else if (i == 5) {
        document.getElementById("nap").style.display = "block";
        document.getElementById("poz").style.display = "none";
		document.getElementById("nazad").innerHTML = "NAZAD";
    }
}

//Klikom na next ili prev u prikazu napada otvaraju se slijedeći igraći ovisno o poziciji
function plusSlidesN(next) {
    if (next == 1 && brojacN==0){
        document.getElementById("napad").style.display = "none";
        document.getElementById("napad2").style.display = "block";
        brojacN = 1;
    }
    else if (next == -1 && brojacN==0) {
        document.getElementById("napad").style.display = "none";
        document.getElementById("napad2").style.display = "block";
        brojacN = 1;
    }
    else if (next == 1 && brojacN==1) {
        document.getElementById("napad").style.display = "block";
        document.getElementById("napad2").style.display = "none";
        brojacN = 0;
    }
    else if (next == -1 && brojacN==1) {
        document.getElementById("napad").style.display = "block";
        document.getElementById("napad2").style.display = "none";
        brojacN = 0;
    }
}
//Klikom na next ili prev u prikazu vezne linije otvaraju se slijedeći igraći ovisno o poziciji
function plusSlidesV(next) {
    if (next == 1 && brojacV == 0) {
        document.getElementById("vezni_red").style.display = "none";
        document.getElementById("vezni_red2").style.display = "block";
        document.getElementById("vezni_red3").style.display = "none";
        brojacV = 1;
    }
    else if (next == -1 && brojacV == 0) {
        document.getElementById("vezni_red").style.display = "none";
        document.getElementById("vezni_red2").style.display = "none";
        document.getElementById("vezni_red3").style.display = "block";
        brojacV = 2;
    }
    else if (next == -1 && brojacV == 1) {
        document.getElementById("vezni_red").style.display = "block";
        document.getElementById("vezni_red2").style.display = "none";
        document.getElementById("vezni_red3").style.display = "none";
        brojacV = 0;
    }
    else if (next == 1 && brojacV == 1) {
        document.getElementById("vezni_red").style.display = "none";
        document.getElementById("vezni_red2").style.display = "none";
        document.getElementById("vezni_red3").style.display = "block";
        brojacV = 2;
    }
    else if (next == -1 && brojacV == 2) {
        document.getElementById("vezni_red").style.display = "none";
        document.getElementById("vezni_red2").style.display = "block";
        document.getElementById("vezni_red3").style.display = "none";
        brojacV = 1;
    }
    else if (next == 1 && brojacV == 2) {
        document.getElementById("vezni_red").style.display = "block";
        document.getElementById("vezni_red2").style.display = "none";
        document.getElementById("vezni_red3").style.display = "none";
        brojacV = 0;
    }
}
//Klikom na nextili prev u prikazu obrane otvaraju se slijedeći igraći ovisno o poziciji
function plusSlidesO(next) {
    if (next == 1 && brojacO == 0) {
        document.getElementById("obrana").style.display = "none";
        document.getElementById("obrana2").style.display = "block";
        document.getElementById("obrana3").style.display = "none";
        brojacO = 1;
    }
    else if (next == -1 && brojacO == 0) {
        document.getElementById("obrana").style.display = "none";
        document.getElementById("obrana2").style.display = "none";
        document.getElementById("obrana3").style.display = "block";
        brojacO = 2;
    }
    else if (next == -1 && brojacO == 1) {
        document.getElementById("obrana").style.display = "block";
        document.getElementById("obrana2").style.display = "none";
        document.getElementById("obrana3").style.display = "none";
        brojacO = 0;
    }
    else if (next == 1 && brojacO == 1) {
        document.getElementById("obrana").style.display = "none";
        document.getElementById("obrana2").style.display = "none";
        document.getElementById("obrana3").style.display = "block";
        brojacO = 2;
    }
    else if (next == -1 && brojacO == 2) {
        document.getElementById("obrana").style.display = "none";
        document.getElementById("obrana2").style.display = "block";
        document.getElementById("obrana3").style.display = "none";
        brojacO = 1;
    }
    else if (next == 1 && brojacO == 2) {
        document.getElementById("obrana").style.display = "block";
        document.getElementById("obrana2").style.display = "none";
        document.getElementById("obrana3").style.display = "none";
        brojacO = 0;
    }
}
//Klikom na odbaci u formi/obrascu za prijavu/registraciju brisu se uneseni podaci
function obrisi(i){
    if(i==1){
        document.getElementById('use').value = '';
        document.getElementById('pass').value = '';
    }
    else if(i==2){
        document.getElementById('rEmail').value = '';
    }
    else if(i==3){
        document.getElementById('rname').value = '';
        document.getElementById('rsurname').value = '';
        document.getElementById('email').value = '';
        document.getElementById('regpass').value = '';
        document.getElementById('rpass').value = '';
    }
}
//Klikom na registracija u formi/obrascu za prijavu otvara se forma registracije a ostalo se zatvara
function reg(i){
    if(i==1){
        document.getElementById('registration').style.display='block';
        document.getElementById('login').style.display='none';
        document.getElementById('loz').style.display='none';
    }
    else if(i==2){
        document.getElementById('registration').style.display='none';
        document.getElementById('login').style.display='none';
        document.getElementById('loz').style.display='block';
    }
    else if(i==3){
        document.getElementById('registration').style.display='none';
        document.getElementById('login').style.display='block';
        document.getElementById('loz').style.display='none';
    }
    
}

function open(i){
    if(i==1){
        document.getElementById('profilInf').style.display='block';
        document.getElementById('ulaz').style.display='none';
    }
    else if(i==2){
        document.getElementById('profilInf').style.display='none';
        document.getElementById('ulaz').style.display='block';
    }
}

function openSlika(i, id){
    if(i==1){
        $( "#prikazSlike" ).show( "slow", function() {
            // Animation complete.
        });
        $('#povecanaSlika').attr("src",id);
    }

    else{
        $( "#prikazSlike" ).hide( "slow", function() {
            // Animation complete.
      });
    }
}

function openUvjeti(i){
    if(i==1){
        $( "#prikazUvjeta" ).show( "slow", function() {
            // Animation complete.
        });
    }

    else{
        $( "#prikazUvjeta" ).hide( "slow", function() {
            // Animation complete.
      });
    }
}

function openKarte(){
    document.getElementById('infKarte').style.display='block';
}