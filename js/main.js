

(function($){
	
/*—————————————————-*/
/*	Menu główne Klasy elementów 
/*—————————————————-*/	
$(document).ready(function(){
	$('.dropdown-menu').addClass('dropdown-menu-upa');
	$('.dropdown-menu').removeClass('dropdown-menu');
		
	$('.dropdown-toggle').addClass('dropdown-toggle-upa');
	$('.dropdown-toggle').removeClass('dropdown-toggle');
});



/*—————————————————-*/
/*	Menu PRAWE
/*—————————————————-*/	
$(document).ready(function(){
	$('.menu-otwieracz').on('click', function(event) {
	$('.menu-otwieracz').css('display','none');
	$('.menu-zamykacz').css('display','block');
	$('.nav-prawe').addClass('kitraj-nav-prawe');
	});	
	
	$('.menu-zamykacz').on('click', function(event) {
		$('.menu-otwieracz').css('display','block');
		$('.menu-zamykacz').css('display','none');
		$('.nav-prawe').removeClass('kitraj-nav-prawe');
	});
});	

/*—————————————————-*/
/*	ScrollReveal
/*—————————————————-*/	
$(document).ready(function(){
	
	var fooReveal = {
				  delay    : 200,
				  distance : '90px',
				  easing   : 'ease-in-out',
				  rotate   : { z: 10 },
				  scale    : 1.1
				};
	
	window.sr = ScrollReveal();
      sr.reveal('.animblock', fooReveal, 50);
	  sr.reveal('.animblockk', { delay:400 }, 50);
	 });

/*—————————————————-*/
/*	Karuzela 
/*—————————————————-*/	 

$(document).ready(function(){
  $("#karuzela-carousel").owlCarousel({
	  autoplay : false,
	  loop: true,
	  dots: true,
	   margin:20,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false,
			loop: true,
			
        },
        425:{
            items:1,
            nav:false,
			loop: true,
        },
        771:{
            items:2,
            nav:false,
			loop: true,
        },
		1200:{
            items:3,
            nav:false,
			loop: true,
        }
    }
	 });
});	
	

	
$(document).ready(function() { 
	$('.navbar-nav a').addClass('nav-link');
	$('.navbar-nav li').addClass('nav-item');
});	
	

/*—————————————————-*/
/*	Menu affix-deeper
/*—————————————————-*/
  	var wys_okna =$(window).height();
  	$(document).scroll(function(){
		 pozycja_obiekt=$('#scrolltop').offset().top;
				if(pozycja_obiekt >= wys_okna+40)
					{
					$('#nav').addClass('affix-deeper');
					$('#nav').removeClass('affix-top');
					}
				if(pozycja_obiekt < wys_okna+40)
					{
					$('#nav').removeClass('affix-deeper');
					$('#nav').addClass('affix-top');
					}
		
				if(pozycja_obiekt >= wys_okna+300)
					{
					$('#nav').addClass('affix-deeper-deep');
					}
				if(pozycja_obiekt < wys_okna+300)
					{
					$('#nav').removeClass('affix-deeper-deep');
					}
		 		});
	

/*—————————————————-*/
/*	Parallaxa
/*—————————————————-*/	
$(document).ready(function(){
    $('.parallax').each(function(){
        var $bgobj = $(this);
 
        $(window).scroll(function() {
            var yPos = -(($(window).scrollTop() - $bgobj.offset().top) / $bgobj.data('speed'));
 
            var coords = '50%'+ yPos + 'px';
 
            $bgobj.css({ backgroundPosition: coords});
        });
    });
});	


/*—————————————————-*/
/*	BANER Parallaxa
/*—————————————————-*/	
$(document).ready(function(){
    $('.baner-paralax').each(function(){
        var $bgobj = $(this);
 var pozycja_obiekt_zero=$('#punkt').offset().top;
        $(window).scroll(function() {
           var yPos = -(($(window).scrollTop() - $bgobj.offset().top) / $bgobj.data('speed'));
		   var pozycja_obiekt=$('#punkt').offset().top;
		   var suma = pozycja_obiekt_zero - pozycja_obiekt;
		   var skok = suma / 5;
 $('h2').text(skok);
            $bgobj.css({ top: skok});
        });
    });
});	


 
 /*—————————————————-*/
/*	animacja elementow
/*—————————————————-*/

$(document).ready(function(){
 
		$('*[data-animate]').addClass('schowaj').each(function(){
			$(this).viewportChecker({
				classToAdd: 'show animated ' + $(this).data('animate'),
				classToRemove: 'pokaz',
				offset: $(this).data('offset')
			});
        });
 
	});
 

/*—————————————————-*/
/*	ukrywanie scrol top
/*—————————————————-*/
  var wys_okna =$(window).height();
  $(document).scroll(function(){
	
	 pozycja_obiekt=$('#scrolltop').offset().top;
			if( pozycja_obiekt >= wys_okna)
				{
				$('#scrolltop > a').css({display:'inline-block'});
				}
				else
				{
				$('#scrolltop > a').css({display:'none'});	
				}
		 });

/*—————————————————-*/
/*    Animacja dla scrollspy
/*—————————————————-*/
 $(document).ready(function() {

    $('a[href*="#"]').on('click', function(event) {
        var target = $( this.href.substring(this.href.indexOf("#")) );
        console.log(target);
        if( target.length ) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 700);
        }
    });

});


/*—————————————————-*/
/*	preloader
/*—————————————————-*/	
$(window).load(function() { 
	$("#preloader #image").fadeOut(); 
	$("#preloader").delay(350).fadeOut("slow"); 
});
	

	
})(jQuery);


