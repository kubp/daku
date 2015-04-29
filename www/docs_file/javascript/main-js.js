 $(document).ready(function(){

 
 


 



//Komentare
$(".comment i").hide();

$(".comment").hover(function () {

 //$(' i', this).fadeIn(200);

});


$(".comment").mouseleave(function () {
    $(".comment i").fadeOut(200);

});


//Menu
$("nav ul").hide();
$("#m_hide_1").css("opacity", "0");
var hm1 = 0;


function menu() {
    $("nav ul").slideToggle();
    if (hm1 == 0) {
        $("#m_hide_1").css("opacity", "1");
        $("#m_hide_2").css("opacity", "0");
        hm1 = 1
    } else {
        $("#m_hide_1").css("opacity", "0");
        $("#m_hide_2").css("opacity", "1");
        hm1 = 0;
    }

}

$("#menu-bar").click(menu);

$("aside, #articles").click(function () {
    $("nav ul").hide("slideToggle");

    $("#m_hide_1").css("opacity", "0");
    $("#m_hide_2").css("opacity", "1");
    hm1 = 0;

});

if ($(window).width() < 1200) {
    $("#article_width").hide();
}

$("#article_width").click(function () {
    $("#article_width").hide();
    $("aside").hide();
    $("article").animate({
        "width": "1000px"
    });
    $("article").animate({
        "margin-left": "-146px"
    });
    $("#date").hide();
    $("#comments").css({
        "margin-left": "-147px"
    });
    $("#articles").animate({
        "width": "850px"
    });
    $("article h1").animate({
        "margin-left": "0px"
    });
   $(".art_img").hide();
});





  $("#scroll_top").hide();

$(window).scroll(function(){
var scroll =$(window).scrollTop();
if(scroll>600){
$("#scroll_top").fadeIn(300);
}else{
$("#scroll_top").fadeOut(200);
}
});



$("#scroll_top").click(function(){
$("html, body").animate({scrollTop:0},600);
});

 });