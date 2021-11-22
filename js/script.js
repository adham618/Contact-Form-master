
// FITTEXT

jQuery("#responsive_headline").fitText(1);

// Validate On Client Side with jQuery 

var usererror =true,
    emailerror =true,
    msgerror =true;

$(function(){
  "use strict";
  $(".username").blur(function(){
    if($(this).val().length < 4){  // show errors
      $(this).css('border', '2px solid #F00');
      $(this).parent().find('.alert-custom').fadeIn(200);
      usererror =true;

    }else{  // No errors
      $(this).css('border', '2px solid #080');
      $(this).parent().find('.alert-custom').fadeOut(200);
      usererror =false;
    }
  });
  $(".email").blur(function(){
    if($(this).val() === ""){  // show errors
      $(this).css('border', '2px solid #F00');
      $(this).parent().find('.alert-custom').fadeIn(200);
      emailerror =true;

    }else{  // No errors
      $(this).css('border', '2px solid #080');
      $(this).parent().find('.alert-custom').fadeOut(200);
      emailerror =false;
    }
  });
  $(".message").blur(function(){
    if($(this).val().length < 10){  // show errors
      $(this).css('border', '2px solid #F00');
      $(this).parent().find('.alert-custom').fadeIn(200);
      msgerror= true;

    }else{  // No errors
      $(this).css('border', '2px solid #080');
      $(this).parent().find('.alert-custom').fadeOut(200);
      msgerror= false;
    }
  });

  // submit form vaildation

  $('.contact-form').submit(function(e){
    if(usererror === true || emailerror === true || msgerror === true) {
      e.preventDefault();
      $('.username, .email, .message').blur();
    }
  });

});