@extends('layouts.user.main')
@section('content')
<section class="l-inner b-detail">
  <div class="img-bdetail">
  <img src="{{asset('images/blog/'.$details->image)}}" alt="">
  </div>
  <div class="text-bdetail">
  <h2 class="title-bdetail">{{$details->title}}</h2>
  <p class="conte-bdetail">
    {{$details->content}}
  </p>
  </div>
</section>
<section class="l-inner b-ldetail">
  <h2 class="title-ldetail">Latest Blogs</h2>
<ul class="blog-list clearfix" id="blog-list">
    
@foreach ($blog_late as $blog)
    <li class="blog-card">
    <div class="blog-cover">
          <img src="{{asset('images/blog/'.$blog->image)}}" alt="">
    </div>
        <h3 class="blog-title">{{$blog->title}}</h3>
        <i class="fa-solid fa-calendar blog-cdate"></i>
        <span class="blog-date">Created At - 
        <?php 
          $created_at = explode(' ',$blog->created_at);
          echo $created_at = $created_at[0];
        ?></span>
        <div class="blog-clength">
          {{$blog->content}}
        </div>
        <a href="{{route('user.blog.detail',$blog->slug)}}" class="blog-detail">To Read</a>
    </li>
@endforeach
    
  </ul>
</section>
@endsection