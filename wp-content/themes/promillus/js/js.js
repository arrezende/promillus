$(document).ready(function(){
  $('.cycle-pager').mouseover(function() {
  var link = $("#banner").find('.cycle-slide').attr("src");
  console.log(link);
  });
});
$(function(){
  
var navigations = $('#header'),
  pos = navigations.offset();

  $(window).scroll(function(){
    var topo = $('#banner-home').height(); // altura do topo
    var scrollTop = $(window).scrollTop(); // qto foi rolado a barra
    
    if(scrollTop > topo+100){
      console.log(scrollTop);
      $('#header').addClass('float').fadeIn('slow');
    }else{
      $('#header').removeClass('float');
    }   
  });

});

$(document).ready(function(){
  $('<a href="#" class="fa fa-bars"></a>').appendTo('#menu');
});
$(document).on('click', '.fa-bars', function () {
	$('.menu').slideToggle('slow').css('display','block');
	event.preventDefault();
});

//botao voltar ao topo
$(document).ready(function() {
  $(".voltarTopo").hide();
  $(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 300) {
        $('.voltarTopo').fadeIn();
      } else {
        $('.voltarTopo').fadeOut();
      }
    });
    $('.voltarTopo').click(function() {
      event.preventDefault();
      $('body,html').animate({scrollTop:0},600);
    }); 
  });
});