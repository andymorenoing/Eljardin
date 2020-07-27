jQuery(function($) {
  var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
      type: 'progressbar',
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

  
});