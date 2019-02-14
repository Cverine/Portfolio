$(document).ready(function(){
    $('.initial, .blinking').hover(
        function(){ $('#home-wrapper').addClass('black');
        },
    );

    $(".project-item").click(function(){
        var getElem = $(this).attr("id");
        $(".projects-description:visible").hide();
        $("#show-"+getElem).show();
    });

    $(".about-wrapper").ready(function() {
    const toCopy = document.querySelector(".to-copy");
    toCopy.onclick = function() {
        document.execCommand("copy");
    }

    toCopy.addEventListener("copy", function(event) {
        event.preventDefault();
        if (event.clipboardData) {
            event.clipboardData.setData("text/plain", toCopy.textContent);
            $('.tooltip').text('Oké, l\'adresse est bien copiée');
            $('.tooltip').css('background-color', '#42af4a')
        }
    });
    });
});


