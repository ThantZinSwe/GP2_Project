$(document).ready(function () {
    const DOMAIN = "http://127.0.0.1:8000/";
    $('#search-course').val('')
    $('#search-course').on('keyup', function () {

        var search_key = $(this).val();
        var type = $('.search-select').val();
        if (search_key) {
            $('.course-card-container').hide()
            $('.search-card-container').show()
        } else {
            $('.course-card-container').show()
            $('.search-card-container').hide()
        }
        $.ajax({
            url: DOMAIN + 'api/courses/search?search=' + search_key + `&type=${type}`,
            method: 'GET',
            success: function (data) {
                if (data) {
                    $('.search-card-container').empty();
                    console.log(data)
                    data.data.forEach(course => {
                        if (course.type === 'free') {
                            $('.search-card-container').append(
                                `<li class="course-card">
                                    <a href="${DOMAIN}courses/${course.slug}">
                                        <img src="${DOMAIN}images/course/${course.image}" alt="" class="course-card-img">
                                        <div class="course-txt-blk">
                                            <h3 class="course-card-ttl">${course.name}</h3>
                                            <p class="course-card-type">Type: <span> ${course.type} </span></p>
                                            <p class="course-card-fee">Fee: <span>${course.price} Ks</span></p>
                                            <ul class="course-card-language">`+
                                course.languages.map(language => {
                                    return (`<li>${language.name}</li>`)})
                                            +`</ul>
                                        </div>
                                    </a>
                            </li>`
                            )
                        } else {
                            $('.search-card-container').append(
                                `<li class="course-card">
                                    <a href="${DOMAIN}courses/${course.slug}">
                                        <img src="${DOMAIN}images/course/${course.image}" alt="" class="course-card-img">
                                        <div class="course-txt-blk">
                                            <h3 class="course-card-ttl">${course.name}</h3>
                                            <p class="course-card-type paid">Type: <span> ${course.type} </span></p>
                                            <p class="course-card-fee">Fee: <span>${course.price} Ks</span></p>
                                            <ul class="course-card-language">`+
                                                course.languages.map(language => {
                                                    return (`<li>${language.name}</li>`)})
                                            +`</ul>
                                        </div>
                                    </a>
                            </li>`)
                        }

                 
                   

                    });
                }
            }
        });
    })
    $('.search-select').on('change', function () {
        $('#search-course').val('')
        var type = $('.search-select').val();
        if (type) {
            $('.course-card-container').hide()
            $('.search-card-container').show()
        } else {
            $('.course-card-container').show()
            $('.search-card-container').hide()
        }
        $.ajax({
            url: DOMAIN + 'api/courses/search?type=' + type,
            method: 'GET',
            success: function (data) {
                if (data) {
                    $('.search-card-container').empty();
                    data.data.forEach(course => {
                        if (course.type === 'free') {
                            $('.search-card-container').append(
                                `<li class="course-card">
                                    <a href="${DOMAIN}courses/${course.slug}">
                                        <img src="${DOMAIN}images/course/${course.image}" alt="" class="course-card-img">
                                        <div class="course-txt-blk">
                                            <h3 class="course-card-ttl">${course.name}</h3>
                                            <p class="course-card-type">Type: <span> ${course.type} </span></p>
                                            <p class="course-card-fee">Fee: <span>${course.price} Ks</span></p>
                                            <ul class="course-card-language">`+
                                course.languages.map(language => {
                                    return (`<li>${language.name}</li>`)})
                                            +`</ul>
                                        </div>
                                    </a>
                            </li>`
                            )
                        } else {
                            $('.search-card-container').append(
                                `<li class="course-card">
                                    <a href="${DOMAIN}courses/${course.slug}">
                                        <img src="${DOMAIN}images/course/${course.image}" alt="" class="course-card-img">
                                        <div class="course-txt-blk">
                                            <h3 class="course-card-ttl">${course.name}</h3>
                                            <p class="course-card-type paid">Type: <span> ${course.type} </span></p>
                                            <p class="course-card-fee">Fee: <span>${course.price} Ks</span></p>
                                            <ul class="course-card-language">`+
                                            course.languages.map(language => {
                                                return (`<li>${language.name}</li>`)})
                                                        +`</ul>
                                        </div>
                                    </a>
                            </li>`)
                        }

                 
                   

                    });
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
            $('.course-card-container').hide()
            $('.search-card-container').show()
        } else {
            $('.course-card-container').show()
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
                        if (course.type === 'free') {
                            $('.search-card-container').append(
                                `<li class="course-card">
                                    <a href="${DOMAIN}courses/${course.slug}">
                                        <img src="${DOMAIN}images/course/${course.image}" alt="" class="course-card-img">
                                        <div class="course-txt-blk">
                                            <h3 class="course-card-ttl">${course.name}</h3>
                                            <p class="course-card-type">Type: <span> ${course.type} </span></p>
                                            <p class="course-card-fee">Fee: <span>${course.price} Ks</span></p>
                                            <ul class="course-card-language">`+
                                course.languages.map(language => {
                                    return (`<li>${language.name}</li>`)})
                                            +`</ul>
                                        </div>
                                    </a>
                            </li>`
                            )
                        } else {
                            $('.search-card-container').append(
                                `<li class="course-card">
                                    <a href="${DOMAIN}courses/${course.slug}">
                                        <img src="${DOMAIN}images/course/${course.image}" alt="" class="course-card-img">
                                        <div class="course-txt-blk">
                                            <h3 class="course-card-ttl">${course.name}</h3>
                                            <p class="course-card-type paid">Type: <span> ${course.type} </span></p>
                                            <p class="course-card-fee">Fee: <span>${course.price} Ks</span></p>
                                            <ul class="course-card-language">`+
                                            course.languages.map(language => {
                                                return (`<li>${language.name}</li>`)})
                                                        +`</ul>
                                        </div>
                                    </a>
                            </li>`)
                        }
                    });
               
                }
            },
            
        });
    })
    $('.search-input').on('focus', function () {
        $('.search-icon').css('display', 'none')
    })
});
