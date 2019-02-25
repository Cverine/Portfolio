$(document).ready(function(){
    $(".about-wrapper").ready(function() {
        var toCopy = document.querySelector(".to-copy");
        if (typeof toCopy !== 'undefined') {
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
        }
    });
});