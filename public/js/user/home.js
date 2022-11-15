$(document).ready(function () {
    $(".scroll-icon").on("click", function (e) {
        e.preventDefault();
        var href = $(this).attr("href");
        $("html, body").animate(
            {
                scrollTop: $(href).offset().top,
            },
            "300"
        );
    });

    $(".home-count").each(function () {
        $(this)
            .prop("Counter", 0)
            .animate(
                {
                    Counter: $(this).text(),
                },
                {
                    duration: 500,
                    easing: "swing",
                    step: function (now) {
                        $(this).text(Math.ceil(now) + "+");
                    },
                }
            );
    });
});
