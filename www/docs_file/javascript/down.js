/*
 Copyright © 2013,
 AndroidRoot.cz
*/

$("nav span").hide();
$("nav li").hover(function(){
$("span",this).animate({ height : 'toggle'}, 150 , "easeOutBack");  //Mozna fadeIn()
$("span",this).css({"box-shadow":"1px 2px 3px grey"});}, function (){
$("nav span").hide();
});
$("#scroll_top").hide();
$(window).scroll(function(){
var scroll =$(window).scrollTop();
if(scroll>600){
$("#scroll_top").fadeIn(300);
}else{
$("#scroll_top").fadeOut(200);
}});
var hash = window.location.hash.substring(1);
$("#scroll_top").click(function(){
$("html, body").animate({scrollTop:0},600);
});

$(".hide_t").css({"width":"230px"});$("#top_help").hide();$("#tr").hide();$("#tr_border").hide();
var hide =1;
   $(".b_1").click(function(){
       if(hide==1){
       $("#top_help").show();   
        $("#tr").show();
       $("#tr_border").show();
        $("#top_help").css({"overflow":"hidden"}); 
       $(".hide_t").css({"width":"230px"})
       $("#top_help").scrollTop(0); 
          $(".hide_t").show();
       hide = 0;
        }else{hide = 1;  $("#top_help").css({"overflow":"hidden"}); 
       $(".hide_t").css({"width":"230px"})
       $("#top_help").scrollTop(0);               
           $("#top_help").css({"height":"380px"});  
       $("#top_help").hide();
      $("#tr").hide();
       $("#tr_border").hide();o=1;
        }   });var o = 1;$('#top_help').bind('DOMMouseScroll', function(e){
      $(".hide_t").hide(); 
     if(e.originalEvent.detail > 0) {
      $(".h_down").show();  
     $("#top_help").css({"overflow":"auto"}); 
        $(window).scrollTop(0);  
          if(o==1){
            $("#top_help").animate({"height":"260px"});
            $("#top_help").animate({scrollTop:85},500);o=0;
    }}else {var top = $("#top_help").scrollTop();if(top==0 ){
        $(".hide_t").show();
       $(".hide_t").css({"width":"230px"})
          $(".h_down").hide();            
           $("#top_help").css({"height":"380px"});  
           }$("#top_help").css({"overflow":"auto"}); 
      if(o==1){
            $("#top_help").animate({"height":"260px"});
     $("#top_help").animate({scrollTop:5},500);
     o=0;
     }}});$(".hide_t").click(function(){
          o=0;
      $("#top_help").css({"overflow":"auto"}); 
           $("#top_help").animate({"height":"260px"});
         $("#top_help").animate({scrollTop:450},500);
           $(".hide_t").hide();  
             $(".h_down").show();   });
     $("#top_help").mouseleave(function(){
      $("#articles, aside, nav").click(function(){
               hide = 1;  
               $("#top_help").css({"overflow":"hidden"}); 
       $(".hide_t").css({"width":"230px"})
       $("#top_help").scrollTop(0);               
           $("#top_help").css({"height":"380px"});  
       $("#top_help").hide();
      $("#tr").hide();
       $("#tr_border").hide();
            o=1; });});

       //MENU
        $("#setting_b").hide();
       $("nav").hover(function(){
        $("#setting_b").fadeIn(300);
              });
       
       $("#articles").mouseenter(function(){
        $("#setting_b").fadeOut(300);
       });