$(document).ready(function() {
    var con=300;
    $(window).scroll(function() {

        var scroller=(-con+($(window).scrollTop())/10);
        $(".discount").css('background-position', '0% '+scroller+'px');
    });

$(window).resize(function(){
    //console.log($( window ).width());
    var scroller=(-con+($(window).scrollTop())/6);
    $(".discount").css('background-position', '0% '+scroller+'px');

    if($( window ).width()<946){
        con=400;
    }else{
        con=300;

    }

    if($( window ).width()>580) {
        $(".dolu").css("cssText", "margin-top:380px !important;");
        $("header").show();

    }else{
        $(".dolu").css("cssText", "margin-top:120px !important;");
    }
});

    if($( window ).width()<580) {
        $(".dolu").css("cssText", "margin-top:120px !important;");
    }

    c=0;


$("#menu-icon").click(function(){

    if(c==0) {
        $(".dolu").css("cssText", "margin-top:10px !important;");
    c=1;
    }else{
        $(".dolu").css("cssText", "margin-top:120px !important;");
        c=0;
    }


        $("header").slideToggle();


});


$(".flash").slideToggle(200).delay(1000).slideToggle(200);


    //autocompl
    //$( "#new-projects" ).load( "/resources/load.html #projects li" );
    $("input").keyup(function(){


        $.get( "d/?s="+$("#s").val()+"", function( data ) {
            if(data!="") {
                $(".autocomplete").html(data);
                $(".autocomplete").show();
            }else{
                $(".autocomplete").hide();
            }
        });

    });

    $(document).on("click","span",function(){

            $("#s").val(($(this).attr( "d" )));


    }
    );



});
