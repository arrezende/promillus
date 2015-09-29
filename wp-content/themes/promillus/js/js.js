/*$(function() {
    $(window).scroll(function()
    {
        var topo = $('#header').height(); // altura do topo
        var rodape = $('#footer').height(); // altura do rodape
        var scrollTop = $(window).scrollTop(); // qto foi rolado a barra
        var tamPagina = $(document).height(); // altura da página
        if(scrollTop > topo){
          //$('#menu').css({'position' : 'absolute', 'margin-top' : scrollTop - (topo-5)});
          $('#header').addClass('float');
        }else{
          //$('#menu').css({'position' : 'relative', 'margin-top' : 0});
          $('#header').removeClass('float');
        }               
    });
});*/

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
      //$('#menu').css({'position' : 'relative', 'margin-top' : 0});
      $('#header').removeClass('float');
    }   
    
                
    /*if($(this).scrollTop() > pos.top+navigations.height() && navigations.hasClass('default')){
      
      navigations.fadeOut('fast', function(){
                      
        $(this).removeClass('default').addClass('float').fadeIn('fast');
      });
      
    } else if($(this).scrollTop() <= pos.top && navigations.hasClass('float')){
      
      navigations.fadeOut('fast', function(){
                      
        $(this).removeClass('float').addClass('default').fadeIn('fast');
      });
    }*/
    
  });

});

$(document).ready(function(){
$('<a href="#" class="fa fa-bars"></a>').appendTo('#menu');
});
$(document).on('click', '.fa-bars', function () {
  
	$('.menu').slideToggle('slow').css('display','block');
	event.preventDefault();
});

