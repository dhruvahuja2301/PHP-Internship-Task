let text1 = "Don't have an account?";
let text2 = "Already have an account?";
$("#button-toggle").on('click', function() {
    if($("#text-toggle").text() === text1) {
        $("#text-toggle").text(text2);
        $("#button-toggle").text("Log-in");
        $($("#front").parent()).fadeOut();
        $($("#sign-up").parent()).fadeIn();
    }
    else if($("#text-toggle").text() === text2) {
        $("#text-toggle").text(text1);
        $("#button-toggle").text("Sign-up");
        $($("#front").parent()).fadeIn();
        $($("#sign-up").parent()).fadeOut();
    }
});

$($("#sign-up").parent()).fadeOut(1);
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });       
    }, false);
})();
