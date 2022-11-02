$(document).ready(function () {
    //Navbar Menu
    $(".menu-toggle").on("click", function () {
        $(this).toggleClass("active");
        $(".sec-mv .header .g-nav").toggleClass("is-show");
    });

    //dropdown menu
    $(".user-pic").on("click", function () {
        $(".dropdown").toggleClass("dropdown-menu-active");
    });

    // csrf token
    let token = document.head.querySelector('meta[name="csrf-token"]');
    if (token) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": token.content,
            },
        });
    } else {
        console.log("csrf token is not found");
    }
});
