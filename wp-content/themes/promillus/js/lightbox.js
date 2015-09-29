$(document).ready(function() {
	//Adiciona elemento no html
	var div = $("<div/>", {class: 'cover-lightbox'});
	var c_close = $('<a href="#" class="close">&#9421;</a>');
	var c_prev = $('<a href="#" class="prev">&lsaquo;</a>');
	var c_next = $('<a href="#" class="next">&rsaquo;</a>');
	var c_alt = $('<p></p>');

    $("body").append(div);

    $('.cover-lightbox').append(c_close);
    $('.cover-lightbox').append(c_prev);
    $('.cover-lightbox').append(c_next);
    //$('.cover-lightbox').append(c_alt);
  
  
	var current = '.lightbox .item.current';
	var thumb = $('.lightbox .item a').attr('href');
	var x = [];
	$('.lightbox .item a').each(function(){
		x.push( $(this).attr('href') );
		$('.lightbox .item a').addClass('thumb');
		var thumb = $(this).next().attr('href');
		console.log(x);
	})
	
	//Função para verificar a posição atual da imagem e remover as setas(prev e next) conforme necessário
	function check_image_position(){				
		if ($(current).is(':last-child')) {
			$('.next').hide();
			$('.prev').show();
		}else if ($(current).is(':first-child')) {
			$('.next').show();
			$('.prev').hide();
		}else{
			$('.next, .prev').show();
		}
	}			

	$('.lightbox .item').on('click', 'a', function(event) {
		event.preventDefault();
		var big_image_href = $(this).attr('href');
		var image_alt = $(this).find('img').attr('alt');
		var thumb = $(this).parent().addClass('parent');
	
		$(this).parent().addClass('current');
		$('.cover-lightbox').fadeIn();
		$('.cover-lightbox').append('<img class="image-in-lightbox" src="'+big_image_href+'" alt="'+image_alt+'"><p class="lightbox-txt">'+image_alt+'</p></div>');

		check_image_position();
	});
	//Fechar
	$('.cover-lightbox').on('click', '.close', function(event) {
		$('.cover-lightbox').fadeOut();
		$('.cover-lightbox .image-in-lightbox').remove();
		$('.cover-lightbox .lightbox-txt').remove();
		$(current).removeClass('current');
	});

	//Função Next e Prev
	$('.cover-lightbox a').on('click', function(e){				
		if($(this).attr('class')=='next'){
			var big_image_href = $(current).next().find('a').attr('href');
			var image_alt = $(current).next().find('img').attr('alt');					

			$(current).next().addClass('current');
			$(current).prev().removeClass('current');

		}else if($(this).attr('class')=='prev'){
			var big_image_href = $(current).prev().find('a').attr('href');
			var image_alt = $(current).prev().find('img').attr('alt');

			$(current).prev().addClass('current');
			$(current).next().removeClass('current');
		}
		check_image_position();

		$('.cover-lightbox .image-in-lightbox').remove();
		$('.cover-lightbox .lightbox-txt').remove();
		$('.cover-lightbox').append('<img class="image-in-lightbox" src="'+big_image_href+'" alt="'+image_alt+'"><p class="lightbox-txt">'+image_alt+'</p></div>');
	});

	//Função miniaturas
});