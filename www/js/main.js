$(document).ready(function() {
    var con=300;
    $(window).scroll(function() {

        var scroller=(-con+($(window).scrollTop())/10);
        $(".discount").css('background-position', '0% '+scroller+'px');
    });

$(window).resize(function(){
    console.log($( window ).width());
    var scroller=(-con+($(window).scrollTop())/6);
    $(".discount").css('background-position', '0% '+scroller+'px');

    if($( window ).width()<946){
        con=400;
    }else{
        con=300;
    }
});


});
