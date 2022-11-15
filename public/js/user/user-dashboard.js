$(function () {
    if (document.querySelector(".alert-error")) {
        $(".dashboard-content .dashboard-blk").hide();
        $(".dashboard-aside li:nth-child(2n)").addClass("active");
        $("#user-password").fadeIn(500);
    } else if ($(window).width() <= 640) {
        $(".dashboard-content .dashboard-blk").hide();
        $("#" + location.href.split("#")[1]).show();
    } else {
        $(".dashboard-aside li:first-child").addClass("active");
        $(".dashboard-content .dashboard-blk").hide();
        $(".dashboard-content .dashboard-blk:first").show();
    }

    $(".profile-list .user-dashboard").click(function () {
        $(".sec-mv .header .profile-nav .profile-sublist li").toggleClass(
            "show"
        );
        if (
            $(".profile-list .user-dashboard .down").hasClass(
                "fa-solid fa-angle-up"
            )
        ) {
            $(".profile-list .user-dashboard .down").removeClass(
                "fa-solid fa-angle-up"
            );
            $(".profile-list .user-dashboard .down").addClass(
                "fa-solid fa-angle-down"
            );
        } else {
            $(".profile-list .user-dashboard .down").removeClass(
                "fa-solid fa-angle-down"
            );
            $(".profile-list .user-dashboard .down").addClass(
                "fa-solid fa-angle-up"
            );
        }
    });

    $(".dashboard-aside li").click(function () {
        $(".dashboard-aside li").removeClass("active");
        $(this).addClass("active");
        $(".dashboard-content .dashboard-blk").hide();
        let activeTab = $(this).find("a").attr("href");
        $(activeTab).fadeIn(500);
        return false;
    });

    $(".sec-mv .header .profile-nav .profile-sublist li").click(function (e) {
        console.log("click");
        let activeTab = $(this).find("a").attr("href");
        $(".dashboard-content .dashboard-blk").hide();
        window.location.href = `http://127.0.0.1:8000/user-dashboard${activeTab}`;
        $(".sec-mv .header .profile-nav").removeClass("is-show");
        $(activeTab).fadeIn(500);
        return;
    });

    $(".profile-toggle-name").on("click", function () {
        $(this).toggleClass("active");
        $(".sec-mv .header .profile-nav").toggleClass("is-show");
    });

    $(".profile-close-toggle").on("click", function () {
        $(".sec-mv .header .profile-nav").removeClass("is-show");
    });

    $('input[type="file"]').each(function () {
        var $file = $(this),
            target = $(
                "#user-edit-profile .profile-img-container .image-cancle"
            );

        $file.on("change", function (event) {
            var fileName = $file.val().split("\\").pop(),
                tmppath = URL.createObjectURL(event.target.files[0]);
            if (fileName) {
                target
                    .addClass("file-ok")
                    .css("background-image", "url(" + tmppath + ")");
                target.find("i").show();
            } else {
                target.removeClass("file-ok");
            }
            target.find("i").on("click", function () {
                target.removeClass("file-ok").css("background-image", "none");
                target.find("i").hide();
                $file.val("");
            });
        });
    });
});
