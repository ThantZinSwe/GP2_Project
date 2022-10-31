@extends('layouts.user.main')
@section('content')
<div class="l-inner">
  <section class="home-sec">
    <div class="clearfix">
      <div class="col-50 left-blk">
        <h3 class="cmn-title">Welcome to <br/><span class="title">CoderCamp</span></h3>
        <p class="cmn-paragraph">Courses and blogs about Programming Languages. Intended to whom that are interested in App and Web Development and   
          don't know what to do. Coder Camp serve both free and paid class and hope all of you guys can know the learning routes and start your developer life.
          </p>
      </div>
      <div class="col-50">
        <img src="{{asset('images/user/home/CSS_Flatline.png') }}" alt="">
      </div>
    </div>
    <section class="info">
      <ul class="info-list clearfix">
        <li class="info-card clearfix">
          <img src="{{ asset('images/user/home/user.png') }}" alt="">
          <div class="info-text">
            <h6>+ 122</h6>
            <span class="info-title">Students</span>
          </div>
        </li>
        <li class="info-card clearfix">
          <img src="{{asset('images/user/home/video.png') }}" alt="">
          <div class="info-text">
            <h6>+ 122</h6>
            <span class="info-title">Video</span>
          </div>
        </li>
        <li class="info-card clearfix">
          <img src="{{asset('images/user/home/blog.png') }}" alt="">
          <div class="info-text">
            <h6>+ 122</h6>
            <span class="info-title">Blog</span>
          </div>
        </li>
    </ul>
    </section>
    <section class="course">
      <ul class="course-list clearfix">
        <li class="course-card">
          <img src="{{asset('images/user/home/laravel.png') }}" alt="">
          <div class="course-info">
            <h6 class="course-title">Php + deep dive Laravel</h6>
            <h6 class="type-blk"><span  class="course-type">Type</span><span class="course-type-text">Free</span></h6>
            <p class="language"><span class="badge php-color">PHP</span><span class="badge laravel-color">Laravel</span></p>
          </div>
        </li>
        <li class="course-card">
          <img src="{{asset('images/user/home/') }}" alt="">
          <div class="course-info">
            <h6 class="course-title">Php + deep dive Laravel</h6>
            <h6 class="type-blk"><span  class="course-type">Type</span><span class="course-type-text">Free</span></h6>
            <p class="language"><span class="badge php-color">PHP</span><span class="badge laravel-color">Laravel</span></p>
          </div>
        </li>
        <li class="course-card">
          <img src="{{asset('images/user/home/') }}" alt="">
          <div class="course-info">
            <h6 class="course-title">Php + deep dive Laravel</h6>
            <h6 class="type-blk"><span  class="course-type">Type</span><span class="course-type-text">Free</span></h6>
            <p class="language"><span class="badge php-color">PHP</span><span class="badge laravel-color">Laravel</span></p>
          </div>
        </li>
      </ul>
      <div class="course-btn">
        <a href="#" class="btn btn-primary">See All Courses</a>
      </div>
    </section>
    <div class="blog clearfix">
      <div class="col-50">
        <img src="{{  asset('images/user/home/blogs-and-article.png') }}" alt=""> 
      </div>
      <div class="col-50">
        <div class="blog">
          <h3 class="title">Blog</h3>
          <p class="cmn-paragraph">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit, possimus reiciendis excepturi eius quae at praesentium. Quidem fugiat voluptas consequuntur possimus exercitationem sunt doloribus. Quis dolor itaque cumque at nostrum.</p>
        </div>
        <div class="blog-btn">
          <a href="#" class="btn btn-primary">See All Blogs</a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
