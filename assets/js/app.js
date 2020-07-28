jQuery(function($) {
  var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  $('.menu_responsive').on('click', function(){
    $('.menu_principal').addClass('openMenu');
  });

  $('.close_menu').on('click', function(){
    $('.menu_principal').removeClass('openMenu');
  });


   //Smooth scrolling with links
  $('a[href*=\\#]').on('click', function(event){     
    
    $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
  });

  $('.galeria_juguetes img').on('click', function(e){
    e.preventDefault();
    let url = $(this).data('src');
    $('.imagen_principal img').remove();
    $('.imagen_principal a').html('<img src="'+url+'"/>')
  });

  $('.imagen_principal img').on('click', function(e){
    e.preventDefault();
  });
  
});