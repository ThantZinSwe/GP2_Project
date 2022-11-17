@extends('layouts.user.main')
@section('content')
<section class="sec-course">
    <div class="l-inner">
        <div class="course-mv-blk">
            <h2 class="course-header"><span>Coder Camp's</span> Courses</h2>
            <p class="course-pargh">
                Above Thousands of students are learning at Coder Camp. <br class="sp"> Why are you waiting for ?
            </p>
            <div class="search-group">
                <select name="" id="" class="search-select">
                    <option value="all">All</option>
                    <option value="paid">Paid</option>
                    <option value="free">Free</option>
                </select>
                <div class="search-input-group">
                    <input type="text" class="search-input" placeholder="Search Courses" id='search-course'>
                    <div class="search-icon"><i class="fa-solid fa-magnifying-glass serch-icon"></i></div>
                </div>
            </div>
            @if(count($languages) > 0)
                <ul class="language-list" >
                    <li class="active"><a href="#" data-tag="all" class="tag-link">All</a></li>
                    @foreach ($languages as $item )
                        <li><a href="#" data-tag="{{$item->id}}" class="tag-link">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            @endif
        </div>
        <ul class="card clearfix card-container">
            @if(count($courses) > 0)
                @foreach ($courses as $item  )

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
            @else
                <span style="text-align: center; font-size: 20px;">There is no Courses Availible!</span>
            @endif
            {{ $courses->links()}}
        </ul>
        <ul class="search-card-container card clear-fix">

        </ul>
    </div>
</section>
@endsection
