@extends('layouts.user.main')
@section('content')
    <section class="course-details-sec">
        <h3 class="course-details-ttl">{{$course->name}} Course Details</h3>

        {{-- Course Details And Video --}}
        <div class="course-details-blk l-inner clearfix">

            @if (Session::has('error'))
                <div class="alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span class="msg">Warning : {{Session::get('error')}}</span>
                    <span class="close-btn">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
            @endif

            {{-- Course Outline --}}
            <div class="outline-blk">
                <h3 class="outline-ttl">
                    <a href="{{route('user.courseDetails',$course->slug)}}">Course Outline</a>
                </h3><br>

                <ul class="outline-lists">
                    @if ($course->type == 'free' || $enroll != '')
                        @foreach ($course->courseVideos as $video)
                        <li>
                            <a href="{{route('user.courseVideo',[$course->slug,$video->slug])}}">
                                <i class="fa-solid fa-unlock"></i> <span>{{$video->name}}</span>
                            </a>
                        </li>
                        @endforeach
                    @else
                        @foreach ($course->courseVideos as $video)
                        <li>
                            <a href="{{route('user.courseVideo',[$course->slug,$video->slug])}}">
                                <i class="fa-solid fa-lock"></i> <span>{{$video->name}}</span>
                            </a>
                        </li>
                        @endforeach
                    @endif

                </ul>
            </div>

            <div class="vd-img-blk">
                <img src="{{asset('images/course/'.$course->image)}}" alt="{{$course->name}}">

                {{-- Course Description --}}
                <div class="description">
                    <h3 class="description-ttl">About Course</h3> <br>
                    <p>{{$course->description}}</p><br>
                    <span class="type">Type : <span class="badge">{{$course->type}}</span></span>
                    <span class="price">Price : <span class="badge">{{$course->price}} Ks</span></span>

                    @if ($course->type == "free" || isset($enroll))
                    @else
                    <a href="{{route('user.enroll',$course->slug)}}" class="btn enroll-btn btn-primary">Enroll Now !</a>
                    @endif
                </div>

                {{-- Course Review --}}
                @if (Auth::check())
                    <div class="review">
                        <textarea name="" id="" cols="30" class="comment" rows="10" placeholder="Enter review"></textarea>
                        <span style="color: red" class="d-none commentError">Comment Field is required.</span>
                        <div class="review-btn">
                            <a href="#" data-slug="{{$course->slug}}" data-user_id="{{auth()->user()->id}}" class="btn btn-primary review-submit">Submit</a>
                        </div>
                    </div>
                @else
                    <div class="review">
                        <span style="font-weight: 600">Please <a href="{{route('login.get')}}" style="text-decoration: underline; color:#60a5fa"> Login </a> to create review</span>
                    </div>
                @endif


                {{-- Course Review Box --}}
                <div class="review-box">
                    <h3>Customers Review</h3>

                    <div class="box">
                        @foreach ($comments as $comment)
                        <div class="review-lists clearfix">
                            <div class="review-profile">
                                <img src="{{asset('images/default_profile.jpg')}}" alt="">
                            </div>
                            <div class="review-info">
                                <p class="name">
                                    {{$comment->user->name}} <small class="minutes">{{$comment->created_at->diffForHumans()}}</small>
                                </p><br>
                                <p class="review-content">
                                    {{$comment->review}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Latest Courses --}}
        <div class="latest-course-blk">
            <ul class="course-details-card-blk l-inner clearfix">
                <h3 class="latest-course-ttl">Latest Courses</h3>

                @foreach ($latestCourses as $latestCourse)
                <li class="course-details-card">
                    <a href="{{route('user.courseDetails',$latestCourse->slug)}}">
                        <img src="{{asset('images/course/'.$latestCourse->image)}}" alt="{{$latestCourse->name}}">
                        <div class="course-info">
                            <p class="course-name">{{$latestCourse->name}}</p>
                            <div class="price">
                                <span>Type : <span class="badge">{{$latestCourse->type}}</span></span>
                                <span>Fees : <span class="badge">{{$latestCourse->price}} Ks</span></span>
                            </div>
                            <div class="language">
                                @foreach ($latestCourse->languages as $language)
                                    <span class="badge">{{$language->name}}</span>
                                @endforeach
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
