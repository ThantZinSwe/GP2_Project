@extends('layouts.user.main')
@section('content')

  <section class="home-sec" id="home-sec">
    <div class="home-tran"></div>
    <div class="l-inner clearfix home-sfirst">
      <div class="left-blk">
        <h3 class="cmn-title">Welcome to <br/><span class="title">CoderCamp</span></h3>
        <p class="cmn-paragraph">Courses and blogs about Programming Languages. Intended to whom that are interested in App and Web Development and Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus 
          
          </p>
      </div>
    </div>
</section>
    <section class="info">
      <div class="l-inner home-ssecond">
      <ul class="info-list clearfix">
        <li class="info-card">
          <i class="fa-solid fa-user-group"></i>
          <div class="info-text">
            <h4 class="home-count">{{$user}}</h4>
            <hr>
            <span class="info-title">Count Students</span>
          </div>
        </li>
        <li class="info-card">
          <i class="fa-solid fa-play"></i>
          <div class="info-text">
            <h4 class="home-count">{{$video}}</h4>
            <hr>
            <span class="info-title">Count Videos</span>
          </div>
        </li>
        <li class="info-card">
          <i class="fa-solid fa-pen-to-square"></i>
          <div class="info-text">
            <h4 class="home-count">{{$blog}}</h4>
            <hr>
            <span class="info-title">Count Blogs</span>
          </div>
        </li>
    </ul>
      </div>
      <a href="#home-sec" class="scroll-icon" id="scroll-icon"><i class="fa-solid fa-angle-up"></i></a>
    </section>
    <!--<section class="course">
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
</section>-->
      <!--<div class="course-btn">
        <a href="{{route('user.course')}}" class="btn btn-primary">See All Courses</a>
      </div>
    </section>-->
    
    <section class="home-bsec">
    
    <div class="l-inner home-sblog clearfix">

      <div class="home-bimage">
      <img src="{{asset('images/user/home/Designer _Flatline.svg') }}">
      </div>
          <div class="home-btext">
            <h4>Programming Blog</h4>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel assumenda quos culpa minima amet quibusdam fuga quaerat sapiente consequatur voluptatibus, id laboriosam saepe pariatur debitis natus laudantium asperiores ducimus impedit.
            </p>
            <a href="{{route('user.blog')}}" class="home-bbtn">See All Blogs</a>
          </div>   

            

        </div>
        </div>
    </div>
  </section>
@endsection
