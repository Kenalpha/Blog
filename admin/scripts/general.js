$(document).ready(function(){
   $("a.mobile").click(function(){
     $(".sidebar").slideToggle('fast');
    });
   window.onresize = function(event){
   	  if ($(window).width() > 450) {
           $(".sidebar").show();
   	  }
   };
});