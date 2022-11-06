$(document).ready(function () {
    const DOMAIN = "http://127.0.0.1:8000/";
    $('#search-course').val('')
    $('#search-course').on('keyup', function () {

        var search_key = $(this).val();
        var type = $('.search-select').val();
        if (search_key) {
            $('.card-container').hide()
            $('.search-card-container').show()
        } else {
            $('.card-container').show()
            $('.search-card-container').hide()
        }
        $.ajax({
            url: DOMAIN + 'api/courses/search?search=' + search_key + `&type=${type}`,
            method: 'GET',
            success: function (data) {
                if (data) {
                    $('.search-card-container').empty();
                    data.data.forEach(course => {
                        console.log(course.course_videos.length)
                        if (course.type == 'free') {
                            $('.search-card-container').append(
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
                                            <p class="create-time"><i class="fa-solid fa-calendar-day"></i> Created At - `+new Date(course.created_at).toLocaleDateString()+`</p>
                
                                            <p class="course-video"><i class="fa-solid fa-video"></i> Videos - <span>${course.course_videos.length}</span></p>
                                            <br>
                
                                            <p class="about-course">
                                                ${course.description}
                                            </p><br>
                                            <div class="language">`+
                                course.languages.map(language => {
                                    return (`<span class="badge">${language.name}</span>`)})
                                + `</div>
                                <div class=price-zero><span>${course.price} Ks</span></div>
                                </div>
                                    </a>
                            </li>`
                            )
                        } else {
                            $('.search-card-container').append(
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
                                            <p class="create-time"><i class="fa-solid fa-calendar-day"></i> Created At -`+new Date(course.created_at).toLocaleDateString()+`</p>
                
                                            <p class="course-video"><i class="fa-solid fa-video"></i> Videos - <span>${course.course_videos.length}</span></p>
                                            <br>
                
                                            <p class="about-course">
                                                ${course.description}
                                            </p><br>
                                            <div class="language">`+
                                course.languages.map(language => {
                                    return (`<span class="badge">${language.name}</span>`)})
                                + `</div>
                                <div class=price><span>${course.price} Ks</span></div>
                                </div>
                                    </a>
                            </li>`
                            )
                        }
                    }
                    );
                }
            }
        });
    })
    $('.search-select').on('change', function () {
        $('#search-course').val('')
        var type = $('.search-select').val();
        if (type) {
            $('.card-container').hide()
            $('.search-card-container').show()
        } else {
            $('.card-container').show()
            $('.search-card-container').hide()
        }
        $.ajax({
            url: DOMAIN + 'api/courses/search?type=' + type,
            method: 'GET',
            success: function (data) {
                if (data) {
                    $('.search-card-container').empty();
                    data.data.forEach(course => {
                        console.log(course.course_videos.length)
                        if (course.type == 'free') {
                            $('.search-card-container').append(
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
                                            <p class="create-time"><i class="fa-solid fa-calendar-day"></i> Created At - `+new Date(course.created_at).toLocaleDateString()+`</p>
                
                                            <p class="course-video"><i class="fa-solid fa-video"></i> Videos - <span>${course.course_videos.length}</span></p>
                                            <br>
                
                                            <p class="about-course">
                                                ${course.description}
                                            </p><br>
                                            <div class="language">`+
                                course.languages.map(language => {
                                    return (`<span class="badge">${language.name}</span>`)})
                                + `</div>
                                <div class=price-zero><span>${course.price} Ks</span></div>
                                </div>
                                    </a>
                            </li>`
                            )
                        } else {
                            $('.search-card-container').append(
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
                                            <p class="create-time"><i class="fa-solid fa-calendar-day"></i> Created At -`+new Date(course.created_at).toLocaleDateString()+`</p>
                
                                            <p class="course-video"><i class="fa-solid fa-video"></i> Videos - <span>${course.course_videos.length}</span></p>
                                            <br>
                
                                            <p class="about-course">
                                                ${course.description}
                                            </p><br>
                                            <div class="language">`+
                                course.languages.map(language => {
                                    return (`<span class="badge">${language.name}</span>`)})
                                + `</div>
                                <div class=price><span>${course.price} Ks</span></div>
                                </div>
                                    </a>
                            </li>`
                            )
                        }
                    }
                    );
                }
            }
        });
    })
    $('.language-list li').on('click', function (e) {
        e.preventDefault();
        let tag = $(this).find('a').data('tag')
        $('.language-list li').removeClass('active')
        $(this).addClass('active')
        var type = $('.search-select').val();
        if (tag) {
            $('.card-container').hide()
            $('.search-card-container').show()
        } else {
            $('.card-container').show()
            $('.search-card-container').hide()
        }
        $.ajax({
            url: DOMAIN + 'api/courses/search?tag=' + tag + `&type=${type}`,
            method: 'GET',
            success: function (data) {
                //console.log('search_key')
                //console.log(search_key)
                if (data) {
                    //console.log(data.links)
                    $('.search-card-container').empty();
                    data.data.forEach(course => {
                        console.log(course.course_videos.length)
                        if (course.type == 'free') {
                            $('.search-card-container').append(
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
                                            <p class="create-time"><i class="fa-solid fa-calendar-day"></i> Created At - `+new Date(course.created_at).toLocaleDateString()+`</p>
                
                                            <p class="course-video"><i class="fa-solid fa-video"></i> Videos - <span>${course.course_videos.length}</span></p>
                                            <br>
                
                                            <p class="about-course">
                                                ${course.description}
                                            </p><br>
                                            <div class="language">`+
                                course.languages.map(language => {
                                    return (`<span class="badge">${language.name}</span>`)})
                                + `</div>
                                <div class=price-zero><span>${course.price} Ks</span></div>
                                </div>
                                    </a>
                            </li>`
                            )
                        } else {
                            $('.search-card-container').append(
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
                                            <p class="create-time"><i class="fa-solid fa-calendar-day"></i> Created At -`+new Date(course.created_at).toLocaleDateString()+`</p>
                
                                            <p class="course-video"><i class="fa-solid fa-video"></i> Videos - <span>${course.course_videos.length}</span></p>
                                            <br>
                
                                            <p class="about-course">
                                                ${course.description}
                                            </p><br>
                                            <div class="language">`+
                                course.languages.map(language => {
                                    return (`<span class="badge">${language.name}</span>`)})
                                + `</div>
                                <div class=price><span>${course.price} Ks</span></div>
                                </div>
                                    </a>
                            </li>`
                            )
                        }
                    }
                    );
               
                }
            },
            
        });
    })
    $('.search-input').on('focus', function () {
        $('.search-icon').hide()
        $(this).css('padding-left', '30px')
    })
    $('.search-input').on('blur', function () {
        $('.search-icon').show()
        $(this).css('padding-left', '49px')
    })
    $('.search-icon').on('click', function () {
        $('.search-input').focus()
    })
});
