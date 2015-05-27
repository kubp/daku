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
    $("#s").keyup(function(){


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



    //Item buy
    var firstattr=$(".buy-button").attr("href");
    $(".m").hover(function (){

        //alert($(".quantity").val());

        var attrib=firstattr+"&q="+$(".quantity").val();


        console.log(attrib);
        $(".buy-button").attr("href",attrib);
        //alert($(".buy-button").attr("href"));
    });



    //Razeni

    $(".item-option select").change(function(){

        var sort = ($(this).val());
        window.location.href="/?sort_by="+sort+"";
    });

    if(getQueryVariable("sort_by")) {
        $(".item-option select").val(getQueryVariable("sort_by"));
    }


    var hash = window.location.hash.substr(1);
    if (hash == "zakoupeno") {
        $(".mini-cart").show();
        $(".close").click(function () {
            $(".mini-cart").hide();
        });
    }

    $(".close").click(function(){
        $(".mini-cart").hide();
    });


//HEADER
   var v=0;
    $(".contact-header").click(function(){


       if(v==0) {
           $(".contact-main").show();
           $(".contact-inputs").show();
           $("#contact").animate({"height": "320px"});
       v=1;
       }else{

           $("#contact").animate({"height": "46px"});
           $(".contact-main").hide();
           $(".contact-inputs").hide();
           v=0;
       }

    });


    $(document).keypress(function(e) {
        if(e.which == 13) {
            send();
        }
    });


    $(".c-e").click(function() {
        send();
    });

    function send(){

        text=$(".msg").val();
        $(".contact-main").append("<span>"+text+"</span><div style='clear: both'></div>");
        $(".msg").val("");
        //socket.emit('send', { name: name, text:text });

    }









});



function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(pair[0] == variable){return pair[1];}
    }
    return(false);
}