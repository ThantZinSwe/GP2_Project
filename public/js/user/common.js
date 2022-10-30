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
});
