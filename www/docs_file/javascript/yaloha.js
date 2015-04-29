 $("#publish").click(function () {

    function validmail(emailAddress) {
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(emailAddress);
    };

    if (!validmail($("#mail").val())) {
        $("#mail").css({
            "border": "1px solid rgba(255,0,51,1)"
        })
    } else {
        $("#mail").css({
            "border": "1px solid rgba(0,100,255,1)"
        })


        if ($("#name").val() == "") {
            $("#name").css({
                "border": "1px solid rgba(255,0,51,1)"
            })

        } else {
            $("#name").css({
                "border": "1px solid rgba(0,100,255,1)"
            })

            if ($("#add_comment textarea").val() == "") {
                $("#add_comment textarea").css({
                    "border": "1px solid rgba(255,0,51,1)"
                })

            } else {
                $("#add_comment textarea").css({
                    "border": "1px solid rgba(0,100,255,1)"
                })

                var name = $("#name").val();
                var mail = $("#mail").val();
                var text = $("#add_comment textarea").val();

                var adresa = location.href;
                $.get(adresa, {
                    action: "add",
                    name: name,
                    mail: mail,
                    text: text,
                    clanek: "<?= Trim($this->C_model->data['0']['name']) ?>"
                });
            
                setTimeout("window.location.href=window.location.href;", 500);


            }




        }




    }


});




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

