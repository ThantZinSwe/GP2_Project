$(document).ready(function () {
    $(".review-submit").on("click", function (e) {
        e.preventDefault();
        $(".commentError").addClass("d-none");
        var comment = $(".comment").val();
        var slug = $(this).data("slug");
        var user_id = $(this).data("user_id");

        $.ajax({
            url: `/api/courses/${slug}/review`,
            method: "POST",
            data: { comment: comment, user_id: user_id },
            dataType: "json",
            success: function (res) {
                console.log(res);
                $(".box").prepend(
                    `<div class="review-lists clearfix">
                        <div class="review-profile">
                            <img src="http://127.0.0.1:8000/images/default_profile.jpg" alt="">
                        </div>
                        <div class="review-info">
                            <p class="name">${res.user["name"]} <small class="minutes">0 second ago</small></p><br>
                            <p class="review-content">
                                ${res.review["review"]}
                            </p>
                        </div>
                    </div>`
                );
            },
            error: function (reject) {
                var res = $.parseJSON(reject.responseText);
                if (res.errors["comment"]) {
                    $(".commentError").removeClass("d-none");
                    $(".commentError").text(res.errors["comment"][0]);
                } else {
                    $(".commentError").addClass("d-none");
                }
            },
        });
    });
});
