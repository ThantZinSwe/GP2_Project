@extends('layouts.user.main')
@section('content')

  <section class="home-sec" id="home-sec">
    <div class="home-tran"></div>
    <div class="l-inner clearfix home-sfirst">
      <div class="left-blk">
        <h3 class="cmn-title">Welcome to <span class="title">CoderCamp</span></h3>
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
    <section class="course">
      <div class="l-inner home-course">
     
            
        <ul class="card clearfix">

                    @foreach ($courses as $item)

                    <li class="card-list">
                        <a href="{{route('user.courseDetails',$item->slug)}}">
                            <div class="card-img">
                                <img src="{{asset('images/course/'.$item->image)}}" alt="">
                                <div class="type">
                                    <span>{{$item->type}} !</span>
                                </div>
                            </div>

                            <div class="card-body">
                                <p class="name">{{$item->name}}</p>
                                <p class="create-time"><i class="fa-solid fa-calendar-day"></i> Created At - {{Carbon\Carbon::parse($item->created_at)->format('Y-m-d')}}</p>

                                <p class="course-video"><i class="fa-solid fa-video"></i> Videos - <span>{{$item->courseVideos->count()}}</span></p>
                                <br>

                                <p class=" about-course">
                                    {{$item->description}}
                                </p><br>

                                <div class="language">
                                    @foreach ($item->languages as $language)
                                        <span class="badge">{{$language->name}}</span>
                                    @endforeach
                                </div>

                                <div class="price{{$item->price == 0 ? '-zero' : ''}}">
                                    <span>{{$item->price}} Ks</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
        <a href="{{route('user.course')}}" class="home-cbtn">See All Courses</a>
      </div>
  </section>
      <a href="#home-sec" class="scroll-icon" id="scroll-icon"><i class="fa-solid fa-angle-up"></i></a>
</section>
   <section class="home-bene">
    <div class="l-inner home-betitl">
      <h4>Awsome Feature</h4>
      <p class="be-titl">Some Benefits of attending our courses...</p>
      <ul class="clearfix be-list">
        <li class="home-belist">
        <i class="fa-solid fa-graduation-cap"></i>
        <h5>On the job training</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ea aspernatur hic illo voluptate tempora possimus dolorem </p>
        </li>
        <li class="home-belist">
        <i class="fa-solid fa-video"></i>
        <h5>Sell Online Course</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ea aspernatur hic illo voluptate tempora possimus dolorem </p>
        </li>
        <li class="home-belist">
        <i class="fa-solid fa-ticket"></i>
        <h5>Discount Coupon</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ea aspernatur hic illo voluptate tempora possimus dolorem </p>
        </li>
      </ul>
    </div>

   </section> 
      
    
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
