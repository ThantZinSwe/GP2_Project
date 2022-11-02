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
        <img src="{{asset('images/user/home/CSS_Flatline.png') }}" alt="mv-image">
      </div>
    </div>
    <section class="info">
      <ul class="info-list clearfix">
        <li class="info-card clearfix">
          <img src="{{ asset('images/user/home/user.png') }}" alt="info-icon">
          <div class="info-text">
            <h6>{{$user}}</h6>
            <span class="info-title">Students</span>
          </div>
        </li>
        <li class="info-card clearfix">
          <img src="{{asset('images/user/home/video.png') }}" alt="info-icon">
          <div class="info-text">
            <h6>{{$video}}</h6>
            <span class="info-title">Video</span>
          </div>
        </li>
        <li class="info-card clearfix">
          <img src="{{asset('images/user/home/blog.png') }}" alt="info-icon">
          <div class="info-text">
            <h6>{{$blog}}</h6>
            <span class="info-title">Blog</span>
          </div>
        </li>
    </ul>
    </section>
    <section class="course">
      <ul class="course-list clearfix">
        @foreach ($courses as $data)
        <li class="course-card">
          <a href="#">
              <img src="{{asset('images/course/'.$data->image)}}" alt="course-image" class="course-card-img">
              <div class="course-txt-blk">
                  <h3 class="course-card-ttl">{{ $data->name }}</h3>
                  <p class="course-card-type">Type: <span>{{ $data->type }}</span></p>
                  <p class="course-card-fee">Fee: <span>{{ $data->price }}Ks</span></p>
                  <ul class="course-card-language">
                    @foreach ($data->languages as $language)
                    <li>{{ $language->name }}</li> 
                    @endforeach
                  </ul>
              </div>
          </a>
      </li> 
        @endforeach
      </ul>
      
      <div class="course-btn">
        <a href="{{route('user.course')}}" class="btn btn-primary">See All Courses</a>
      </div>
    </section>
    
    <div class="blog clearfix">
      <div class="col-50">
        <img src="{{  asset('images/user/home/blogs-and-article.png') }}" alt="blog-image"> 
      </div>
      <div class="col-50">
        <div class="blog">
          <h3 class="blg-title">Blog</h3>
          <p class="cmn-paragraph blog-paragraph">CoderCamp presents blogs and tricks weekly or monthly.We try our best to present valuable and useful tips and tricks in every blog.</p>
          <div class="blog-btn">
            <a href="{{route('user.blog')}}" class="btn btn-primary">See All Blogs</a>
          </div>
        </div>
        </div>
    </div>
  </section>
</div>
@endsection
