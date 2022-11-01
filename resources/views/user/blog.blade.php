@extends('layouts.user.main')
@section('content')
<section class="l-inner blog">
  <div class="blog-title">
    <h2 class="blog-1">CoderCamp's</h2>
    <h2 class="blog-2">&nbspBlog</h2>
  </div>
  <form action="{{route('user.blog')}}" class="blog-form" method="get">
  {{ csrf_field() }}
    <div class="search-box">
        <input type="text" class="blog-search" name="blog-search" value="{{$search}}">
        <input type="submit" class="blog-submit" value="Search">
    </div>
  </form>
  <ul class="blog-list clearfix" id="blog-list">
    @foreach ($blogs as $blog)
    <li class="blog-card">
      <div>
        <img src="{{asset('images/blog/'.$blog->image)}}" alt="">
      </div>
      <h3>{{$blog->title}}</h3>
      <a href="{{route('user.blog.detail',$blog->slug)}}" class="blog-detail">Read</a>
    </li>
    @endforeach
  </ul>
  {{ $blogs->links()}}
</section>
@endsection