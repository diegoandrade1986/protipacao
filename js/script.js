$(document).ready(function() {

	// aumentando a fonte
	$(".inc-font").click(function () {
		var size = $("body").css('font-size');

		size = size.replace('px', '');
		size = parseInt(size) + 1.4;

		$("body").animate({'font-size' : size + 'px'});
	});

	//diminuindo a fonte
	$(".dec-font").click(function () {
		var size = $("body").css('font-size');

		size = size.replace('px', '');
		size = parseInt(size) - 1.4;

		$("body").animate({'font-size' : size + 'px'});
	});

	// resetando a fonte
	$(".res-font").click(function () {
		$("body").animate({'font-size' : '1.4em'});
	});

});
// Fim função aumentar e diminuir

// Back to top
$(function(){
	$('.back-to-top').hide();
	
	$(window).scroll(function(){
		if($(this).scrollTop() > 200){
			$('.back-to-top').fadeIn();
		}else{
			$('.back-to-top').fadeOut();
		}
	});
	$('.back-to-top').click(function(){
		$('html , body').animate({
			scrollTop: 0
		}, 800);
	});
});



//Menu Fixo no Topo
	$(function(){   
		var nav = $('#meuMenu');   
		$(window).scroll(function () { 
            if ($(this).scrollTop() > 180){ 
				nav.addClass("menu-fixo"); 
			} else { 
				nav.removeClass("menu-fixo"); 
			} 
		});  
	});


