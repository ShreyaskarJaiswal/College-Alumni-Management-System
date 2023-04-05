//To change navigation bar colour on scrolling 
 $(window).scroll(function(){
 $('nav').toggleClass('scrolled', $(this).scrollTop() > 200);
 });