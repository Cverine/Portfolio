$(document).ready(function(){
    $('.initial, .blinking').hover(
        function(){ $('#home-wrapper').addClass('black');
        }
    );

    $(".project-item").click(function(){
        var getElem = $(this).attr("id");
        $(".projects-description:visible").hide();
        $("#show-"+getElem).show();
    });



});


