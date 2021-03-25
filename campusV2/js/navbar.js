var num = 150;

      $(window).bind('scroll', function () 
      {
        if ($(window).scrollTop() > num) 
        {
          $('.menu').addClass('fixed');
          //$('.page-header').addClass('hide-header');
        } 
        else 
        {
          $('.menu').removeClass('fixed');
          //$('.page-header').removeClass('hide-header');
        }
      });