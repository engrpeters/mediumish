
//console.log($('div').offset().top)
//var topOfOthDiv = $(".hideshare").offset().top;

$(function(){
  var topOfOthDiv = $(".hideshare").offset() ? $(".hideshare").offset().top : 0;
  $(window).scroll(function() {
      if($(window).scrollTop() > topOfOthDiv) { //scrolled past the other div?
          $(".share").hide(); //reached the desired point -- show div
      }
      else{
        $(".share").show();
      }
  });
});
