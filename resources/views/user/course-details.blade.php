@extends('layouts.user.main')
@section('content')
    <section class="course-details-sec">
        <h3 class="course-details-ttl">Laravel Course Details</h3>

        {{-- Course Details And Video --}}
        <div class="course-details-blk l-inner clearfix">

            {{-- Course Outline --}}
            <div class="outline-blk">
                <h3 class="outline-ttl">Course Outline</h3><br>
                <ul class="outline-lists">
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-lock"></i> <span>Tutorial 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-lock"></i> <span>Tutorial 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-lock"></i> <span>Tutorial 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-lock"></i> <span>Tutorial 1</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-lock"></i> <span>Tutorial 1</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-lock"></i> <span>Tutorial 1</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="vd-img-blk">
                {{-- <img src="{{asset('images/laravel.png')}}" alt=""> --}}
                <iframe width="1" height="1" src="https://www.youtube.com/embed/MYyJ4PuL4pY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                {{-- Course Description --}}
                <div class="description">
                    <h3 class="description-ttl">About Course</h3> <br>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis,
                        asperiores molestias necessitatibus vel vitae alias, amet fugiat eius
                        sapiente animi facere accusantium dicta, veritatis eos! Eius eaque quibusdam
                        cupiditate explicabo!
                    </p><br>
                    <span class="type">Type : <span class="badge">Paid</span></span>
                    <span class="price">Price : <span class="badge">50000 Ks</span></span>
                    <a href="#" class="btn enroll-btn btn-primary">Enroll Now !</a>
                </div>

                {{-- Course Review --}}
                <div class="review">
                    <form action="">
                        <textarea name="" id="" cols="30" rows="10" placeholder="Enter review"></textarea>
                        <div class="review-btn">
                            <button type="submit" class="btn btn-primary">Review</button>
                        </div>
                    </form>
                </div>

                {{-- Course Review Box --}}
                <div class="review-box">
                    <h3>Customers Review</h3>

                    <div class="review-lists clearfix">
                        <div class="review-profile">
                            <img src="{{asset('images/default_profile.jpg')}}" alt="">
                        </div>
                        <div class="review-info">
                            <p class="name">Thant Zin Swe</p><br>
                            <p class="review-content">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Vero a, temporibus consequatur esse eligendi, repellat quas corrupti quis,
                                consequuntur quia beatae dolore recusandae rerum officia ab quibusdam quo.
                                Itaque, deleniti?
                            </p>
                        </div>
                    </div>

                    <div class="review-lists clearfix">
                        <div class="review-profile">
                            <img src="{{asset('images/default_profile.jpg')}}" alt="">
                        </div>
                        <div class="review-info">
                            <p class="name">Thant Zin Swe</p><br>
                            <p class="review-content">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Vero a, temporibus consequatur esse eligendi, repellat quas corrupti quis,
                                consequuntur quia beatae dolore recusandae rerum officia ab quibusdam quo.
                                Itaque, deleniti?
                            </p>
                        </div>
                    </div>

                    <div class="review-lists clearfix">
                        <div class="review-profile">
                            <img src="{{asset('images/default_profile.jpg')}}" alt="">
                        </div>
                        <div class="review-info">
                            <p class="name">Thant Zin Swe</p><br>
                            <p class="review-content">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Vero a, temporibus consequatur esse eligendi, repellat quas corrupti quis,
                                consequuntur quia beatae dolore recusandae rerum officia ab quibusdam quo.
                                Itaque, deleniti?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Latest Courses --}}
        <div class="latest-course-blk">
            <ul class="course-details-card-blk l-inner clearfix">
                <h3 class="latest-course-ttl">Latest Courses</h3>

                <li class="course-details-card">
                    <a href="">
                        <img src="{{asset('images/laravel.png')}}" alt="">
                        <div class="course-info">
                            <p class="course-name">Laravel Advance</p>
                            <div class="price">
                                <span>Type : <span class="badge">Paid</span></span>
                                <span>Fees : <span class="badge">10000 Ks</span></span>
                            </div>
                            <div class="language">
                                <span class="badge">Laravel</span>
                                <span class="badge">Laravel</span>
                                <span class="badge">Laravel</span>
                            </div>
                        </div>
                    </a>
                </li>


                <li class="course-details-card">
                    <a href="">
                        <img src="{{asset('images/laravel.png')}}" alt="">
                        <div class="course-info">
                            <p class="course-name">Laravel Advance</p>
                            <div class="price">
                                <span>Type : <span class="badge">Paid</span></span>
                                <span>Fees : <span class="badge">10000 Ks</span></span>
                            </div>
                            <div class="language">
                                <span class="badge">Laravel</span>
                                <span class="badge">Laravel</span>
                                <span class="badge">Laravel</span>
                            </div>
                        </div>
                    </a>
                </li>

                <li class="course-details-card">
                    <a href="">
                        <img src="{{asset('images/laravel.png')}}" alt="">
                        <div class="course-info">
                            <p class="course-name">Laravel Advance</p>
                            <div class="price">
                                <span>Type : <span class="badge">Paid</span></span>
                                <span>Fees : <span class="badge">10000 Ks</span></span>
                            </div>
                            <div class="language">
                                <span class="badge">Laravel</span>
                                <span class="badge">Laravel</span>
                                <span class="badge">Laravel</span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </section>
@endsection
