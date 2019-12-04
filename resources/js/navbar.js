$(document).ready(function() {
    $(".dropdown").hover(
        function(ev) {
            $(this)
                .children(".dropdown-menu")
                .finish()
                .slideDown("medium");
        },
        function(ev) {
            $(this)
                .children(".dropdown-menu")
                .finish()
                .slideUp("slow");
        }
    );
});
