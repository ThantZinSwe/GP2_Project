@extends('layouts.user.main')
@section('content')
<section class="l-inner b-detail">
  <div class="img-bdetail">
  <img src="{{asset('images/blog/'.'635f7f151abd9-Screenshot (52).png')}}" alt="">
  </div>
  <div class="text-bdetail">
  <h2 class="title-bdetail">{{$details->title}}</h2>
  <p class="conte-bdetail">
    {{$details->content}}
  </p>
  </div>
</section>
<section class="l-inner b-ldetail">
  <h2 class="title-ldetail">Latest Blog</h2>
<ul class="blog-list clearfix" id="blog-list">
    
@foreach ($blog_late as $blog)
    <li class="blog-card">
      <div>
        <img src="{{asset('images/blog/'.$blog->image)}}" alt="">
      </div>
      <h3>{{$blog->title}}</h3>
      <a href="{{route('user.blog.detail',$blog->slug)}}" class="blog-detail">Read</a>
    </li>
@endforeach
    
  </ul>
</section>
@endsection