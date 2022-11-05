@extends('layouts.user.main')
@section('content')
<div class="blog-all">
<section class="l-inner blog">
  <div class="blog-htitle">
    <h2 class="blog-1">CoderCamp's</h2>
    <h2 class="blog-2">&nbspBlog</h2>
  </div>
  <form action="{{route('user.blog')}}" class="blog-form" method="get">
  {{ csrf_field() }}
    <div class="search-box">
        <input type="text" class="blog-search" name="blog-search" value="{{$search}}" placeholder="Search Blog">
        <button type="submit" class="blog-submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
  </form>
  <ul class="blog-list clearfix" id="blog-list">
    @foreach ($blogs as $blog)
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
          {{$blog->content}}}
        </div>
        <a href="{{route('user.blog.detail',$blog->slug)}}" class="blog-detail">To Read</a>
    </li>
    @endforeach
  </ul>
  {{ $blogs->links()}}
</section>
</div>
@endsection