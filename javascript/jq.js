//pokretanje prilikom otvaranja stranice
$(document).ready(function () {
    // dodavanje animiranog scrollinga prilikom odabira jedne od opcija iz izbornika 
    $(".nav").on('click', function (event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } 
    });  

    //prijava u sustav i sakrivanje div-ova vezanih uz prijavu, registraciju i prikazivanje odjave
    if(document.getElementById('greska').innerText=="Uspješna prijava!"){
        document.getElementById('registration').style.display='none';
        document.getElementById('login').style.display='none';
        document.getElementById('greska').style.display='none';
        document.getElementById('omotUtak').style.display='block';
        document.getElementById('odjava').style.display='inline';
    }    

    //div vijesti se prvo sakrije te zatim u funkciji prikaže
    $('.sectio').hide();
    var count = 0;
    //otvaranje novih vijesti preko div klase
    $('#btnClick').on('click',function(){
        $('.sectio:eq('+count+')').show();
        count++;
    });

    /* Otvaranje slika klikom na slike + animacija */
    $( "#uslike" ).click(function() {
        $( "#drzacSlike" ).show( "slow", function() {
          // Animation complete.
        });
        $( "#drzacKarata" ).hide( "slow", function() {
            // Animation complete.
          });
    });
    
    /* Otvaranje karata klikom na karte + animacija */
    $( "#kartee" ).click(function() {
        $( "#drzacKarata" ).show( "slow", function() {
          // Animation complete.
        });
        $( "#drzacSlike" ).hide( "slow", function() {
            // Animation complete.
          });
    });

    /* Provjera max vrijednosti kod rezervacije karata */
    $( ".trib" ).change(function () {
            $( "select option:selected" ).each(function() {
                var tribina = $('.trib').val();
                var idUtak = $('.idUtak').val();
                $.post("provjeraMax.php",{
                    odabir: tribina,
                    id:idUtak
                }, function(data){
                    $(".brKarata").attr("max",data);
                });
            });
        });
});



