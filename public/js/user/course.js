$(document).ready(function () {
    const DOMAIN = "http://127.0.0.1:8000/";
    $("#search-course").val("");
    $("#search-course").on("keyup", function () {
        var search_key = $(this).val();
        $(".language-list li").removeClass("active");
        $(".language-list li:first-child").addClass("active");
        var type = $(".search-select").val();
        if (search_key) {
            $(".card-container").hide();
            $(".search-card-container").show();
        } else {
            $(".card-container").show();
            $(".search-card-container").hide();
        }
        $.ajax({
            url:
                DOMAIN +
                "api/courses/search?search=" +
                search_key +
                `&type=${type}`,
            method: "GET",
            success: function (data) {
                showCard(data);
            },
        });
    });
    $(".search-select").on("change", function () {
        $("#search-course").val("");
        $(".language-list li").removeClass("active");
        $(".language-list li:first-child").addClass("active");
        var type = $(".search-select").val();
        if (type) {
            $(".card-container").hide();
            $(".search-card-container").show();
        } else {
            $(".card-container").show();
            $(".search-card-container").hide();
        }
        $.ajax({
            url: DOMAIN + "api/courses/search?type=" + type,
            method: "GET",
            success: function (data) {
                showCard(data);
            },
        });
    });

    $(document).on("click", ".search-card-container .search-pagination a", function (e) {
        e.preventDefault();
        let href = $(this).attr("href")
        let page = $(this).attr("href").split("page=")[1]
        pagination(href);
        $('.search-card-container .search-pagination .page-item').removeClass('active')
        $(this).parent('.search-card-container .page-item').addClass('active')
        $(this).parent('.search-card-container .page-item').attr('aria-current', 'page')
        console.log(page)
    });

    function pagination(href) {
        $.ajax({
            url: href,
            success: function (data) {
            
                showCard(data);
            },
        });
    }

    $(".language-list li").on("click", function (e) {
        e.preventDefault();

        $("#search-course").val("");
        let tag = $(this).find("a").data("tag");
        if (tag == "all") {
            $(".search-select").val("all");
        }
        $(".language-list li").removeClass("active");
        $(this).addClass("active");
        var type = $(".search-select").val();
        if (tag) {
            $(".card-container").hide();
            $(".search-card-container").show();
        } else {
            $(".card-container").show();
            $(".search-card-container").hide();
        }
        $.ajax({
            url: DOMAIN + "api/courses/search?tag=" + tag + `&type=${type}`,
            method: "GET",
            success: function (data) {
               
                showCard(data);
            },
        });
    });

    function showCard(data) {
        if (data) {
            console.log(data)
            $(".search-card-container").empty();
            data.data.forEach((course) => {
                var price_str = "price";
                if (course.price == 0) {
                    price_str = "price-zero";
                }
                $(".search-card-container").append(
                    `<li class="card-list">
                        <a href="${DOMAIN}courses/${course.slug}">
                            <div class="card-img">
                                <img src="${DOMAIN}images/course/${course.image}" alt="card-img">
                                <div class="type">
                                    <span> ${course.type} !</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="name">${course.name}</h3>
                                <p class="create-time"><i class="fa-solid fa-calendar-day"></i> Created At -` +
                        new Date(course.created_at).toLocaleDateString() +
                        `</p>

                                <p class="course-video"><i class="fa-solid fa-video"></i> Videos - <span>${course.course_videos.length}</span></p>
                                <br>

                                <p class="about-course">
                                    ${course.description}
                                </p><br>
                                <div class="language">` +
                        course.languages.map((language) => {
                            return `<span class="badge">${language.name}</span>`;
                        }) +
                        `</div>
                    <div class=${price_str}><span>${course.price} Ks</span></div>
                    </div>
                        </a>
                </li>`
                );
      
            });
            
            
            if (data.links.length > 3) {
                
                let rowLen = data.links.length
                $(".search-card-container").append(`
                <nav>
                    <ul class="pagination search-pagination">
                       `+
                   
                    data.links.map((data, i) => {
                   
                        if (rowLen === i + 1) {
                            return (`<li class="page-item ${data.active ? 'active': ''}">
                            <a class="page-link" href="${data.url}">›</a>
                        </li>`)
                        }
                        if (i === 0) {
                            return (`<li class="page-item ${data.active ? 'active': ''}" >
                            <a class="page-link" href="${data.url}">‹</a>
                            </li>`)
                        }
                        
                        return (`<li class="page-item ${data.active ? 'active': ''}" >
                            <a class="page-link" href="${data.url}">${data.label}</a>
                        </li>`)
                        
               
                    }).join(' ')
                    +`
                    </ul>
                </nav>
                `);
            }
        }
    }

    $(".search-input").on("focus", function () {
        $(".search-icon").hide();
        $(this).css("padding-left", "30px");
    });

    $(".search-input").on("blur", function () {
        $(".search-icon").show();
        $(this).css("padding-left", "49px");
    });

    if ($(window).width() <= 640) {
        $(".search-input").on("blur", function () {
            $(".search-icon").show();
            $(this).css("padding-left", "6.363vw");
        });
        $(".search-input").on("focus", function () {
            $(".search-icon").hide();
            $(this).css("padding-left", "6.363vw");
        });
    }

    $(".search-icon").on("click", function () {
        $(".search-input").focus();
    });
});
