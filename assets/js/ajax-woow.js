jQuery(function($) {

  /*
  ==============================================
  Scripts to validate input Email
  ==============================================
  */

  function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (!emailReg.test(email)) {
      return false;
    } else {
      return true;
    }
  }

  /*
  ==============================================
  Scripts to Validate numbers
  ==============================================
  */

  function ValidNumber(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if ((tecla == 8) || (tecla == 0)) {
      return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
  }

  /*
  ==============================================
  Scripts to validate input requires in form
  ==============================================
  */
  function validate(formData, jqForm, options) {
    var inputValidate = true;
    $(jqForm.selector + ' .woowRequireFail').removeClass('woowRequireFail');

    // Validate inputs type [text]
    for (var i = 0; i < formData.length; i++) {
      var inputName = formData[i].name;
      // Validate inputs type [text]
      if (formData[i].required == true && !formData[i].value) {
        inputValidate = false;
        $(jqForm.selector + ' [name="' + inputName + '"]').addClass('woowRequireFail');
      }
      // Validate inputs type [email]
      if (formData[i].type == 'email' && formData[i].value) {
        inputValidEmail = validateEmail(formData[i].value);
        if (!inputValidEmail) {
          inputValidate = false;
          $(jqForm.selector + ' input[name="' + inputName + '"]').addClass('woowRequireFail');
        }
      }
    }
    // Validate inputs type [radio]
    $(jqForm.selector).find(":radio, :checkbox").each(function() {
      // get name of input
      name = $(this).attr('name');
      // get attribute required of input
      requiredVal = $(this).attr('required');
      // get attribute checked of input
      checkedVal = $('[name="' + name + '"]:checked').length;
      // validate attributes of input
      if (requiredVal && checkedVal == 0) {
        inputValidate = false;
        $(this).closest('.parentValidate').addClass('woowRequireFail');
      }
    });

    if (!inputValidate) {
      $('#alertFailValidation').fadeIn(200);
      $('#loader_special').fadeOut(300);
      return false;
    }
  }

  /*
  ==============================================
  Scripts Ajax to send mail "Contact"
  ==============================================
  */

  SendForm = function(idFom) {
    $(idFom).find(".input_submit").attr('disabled', 'disabled');
    var options = {
      type: "POST",
      url: MyAjax.url,
      dataType: "json",
      resetForm: true,
      beforeSubmit: validate,
      beforeSend: function() {
        $('#loader_special').fadeIn(200);
        $('#loader_special .expecial_txt_loader').html('Enviando...');
      },
      success: function(msn) {
        if (msn.validate == true) {
          $('.alertOk').fadeIn(0);
        } else {
          $('#alertFailSend').fadeIn(0);
        }
      },
      error: function(msn) {
        console.log(msn);
      },
      complete: function() {
        $("#loader_special").fadeOut(200);
      }
    }

    $(idFom).ajaxSubmit(options);

    setTimeout(function() {
      $('.alertFail').fadeOut(2000, 'swing');
      $('.alertOk').fadeOut(4000);
      $(idFom).find(".input_submit").removeAttr('disabled');
    }, 4000);
  }

  // Publicamos la funcion paraque sea visible desde afuera
  this.SendForm;

  /*
  ==============================================
  Scripts Genral query
  ==============================================
  */
  productsTiendas = function ( category, num_productos, type_s ){
    $.ajax({
      type: "POST",
      url: MyAjax.url,
      dataType: "json",
      data: {
        action : 'get_tienda_productos',
        category : category,
        num_productos : num_productos,
        type_s: type_s
      },
      beforeSend: function() {
        $("#loader_special").fadeIn(200);
        $("#loader_special .expecial_txt_loader").html(
          "Cargando Productos"
        );
      },
      success: function(msn) {
       
        if (msn.validate) {
          $('#valor_categoria').val( category );
          $('#data_find').val( type_s );
          $('div.section_2_recetas').html(msn.productos);
          if ( msn.total_pages == false ) {
            if ($(".sec_pagination").length) {
              $( '.sec_pagination' ).remove();
            }
          }else{
        
            var totalPages = msn.total_pages;

            $( '.sec_pagination' ).remove();
            $('.content_pagination').html('<div class="sec_pagination"><p>Pagina</p><div id="pagination" class="products_pagination"></div></div>');

            var $pagination = $("#pagination");
            $pagination.twbsPagination({
              startPage: 1,
              totalPages: totalPages,
              visiblePages: 3,
              initiateStartPageClick: false,
              first: 'Primera',
              prev: '<i class="icon-arrow-left"></i>',
              next: '<i class="icon-arrow-right"></i>',
              last: 'Última',
              activeClass: 'activePag',
              onPageClick: function (event, page) {
                
                var num_productos = $('.numero_productos').val();
                PrintPageProducts( 'input', category, page, num_productos, type_s );
                
              }
            });
            
            

          }
        } else {
          alert("No se pudo relizar la accion vuelva a cargar la pagina");
        }
      },

      error: function(msn) {
        console.log(msn);
      },

      complete: function() {
        $("#loader_special").fadeOut(200);
      }
    });
  }

  // Publicamos la funcion para que sea visible desde afuera
  this.productsTiendas;
  /*
  ==============================================
  Scripts Home Productos
  ==============================================
  */
  if ($(".action_category").length) {
    $("body").on("click", ".action_category", function(e) {
      e.preventDefault();
      //datos
      var category = $(this).attr("data_slugcategory");

      $.ajax({
        type: "POST",
        url: MyAjax.url,
        dataType: "json",
        data: {
          action : 'get_home_productos',
          category : category
        },
        beforeSend: function() {
          $("#loader_special").fadeIn(200);
          $("#loader_special .expecial_txt_loader").html(
            "Cargando Productos"
          );
        },
        success: function(msn) {
          if (msn.validate) {
            $('div.section_2_recetas').html(msn.productos);
          } else {
            alert("No se pudo relizar la accion vuelva a cargar la pagina");
          }
        },

        error: function(msn) {
          console.log(msn);
        },

        complete: function() {
          $("#loader_special").fadeOut(200);
        }
      });
    });
  }

  /*
  ==============================================
  Scripts Tienda Productos
  ==============================================
  */
  if ($(".tienda_category").length) {
    $("body").on("click", ".tienda_category", function(e) {
      e.preventDefault();
      //datos
      var category = $(this).attr("data_slugcategory");
      var num_productos = $('.numero_productos').val();
      var type_s = 'category';
      productsTiendas( category, num_productos, type_s );
    });
    $(".numero_productos").change(function() {
      var num_productos = $(this).val();
      var category = $('#valor_categoria').val();
      var type_s = $('#data_find').val();
      productsTiendas( category, num_productos, type_s );
    });
  }

  /*
	==============================================
	Scripts Page Products
	==============================================
	*/	

	PrintPageProducts = function ( type, find, page, num_productos, type_s ){

    $('html, body').animate({scrollTop: '0px'}, 1000);
    $.ajax({
      type: "POST",
      url: MyAjax.url,
      dataType: "json",
      data: {
        action : 'get_pagination_productos',
        category : find,
        paged: page,
        num_productos: num_productos,
        type_s: type_s
      },
      beforeSend: function() {
        $("#loader_special").fadeIn(200);
        $("#loader_special .expecial_txt_loader").html(
          "Cargando Productos"
        );
      },
      success: function(msn) {
        if (msn.validate) {
          $('div.section_2_recetas').html(msn.productos);
        } else {
          alert("No se pudo relizar la accion vuelva a cargar la pagina");
        }
      },

      error: function(msn) {
        console.log(msn);
      },

      complete: function() {
        $("#loader_special").fadeOut(200);
      }
    });
		
	}

	// Publicamos la funcion para que sea visible desde afuera
	this.PrintPageProducts;

});