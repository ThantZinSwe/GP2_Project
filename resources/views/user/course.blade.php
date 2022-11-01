@extends('layouts.user.main')
@section('content')
<section class="sec-course">
    <div class="l-inner">
        <div class="course-mv-blk">
            <h2 class="course-header"><span>Coder Camp's</span> Courses</h2>
            <p class="course-pargh">
                Above Thousands of students are learning at Creative Coder. Why are you waiting for ?
            </p>
            <div class="search-group">
                <select name="" id="" class="search-select">
                    <option value="all">All</option>
                    <option value="paid">Paid</option>
                    <option value="free">Free</option>
                    <input type="text" class="search-input" placeholder="Search For Courses" id='search-course'>
                </select>
                
            </div>
            @if(count($languages) > 0)
                <ul class="language-list" >
                    <li class="active"><a href="#">All</a></li>
                    @foreach ($languages as $item )
                        <li><a href="#" data-tag="{{$item->id}}" class="tag-link">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            @endif
        </div>
        <ul class="course-card-container clear-fix">
            @if(count($courses) > 0)
                @foreach ($courses as $item  )
                <li class="course-card">
                    <a href="#">
                        <img src="{{ asset("images/course/$item->image") }}" alt="" class="course-card-img">
                        <div class="course-txt-blk">
                            <h3 class="course-card-ttl">{{ $item->name }}</h3>
                            @if($item->type == 'free')
                            <p class="course-card-type">Type: <span>{{ $item->type }}</span></p>
                            @else
                            <p class="course-card-type paid">Type: <span>{{ $item->type }}</span></p>
                            @endif
                            <p class="course-card-fee">Fee: <span>{{ $item->price }} Ks</span></p>
                            <ul class="course-card-language">
                                @foreach ($item->languages as $language )
                                    <li> {{ $language->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </a>
                </li>
                @endforeach
               
            @else
                <span>There is no Courses Availible!</span>
            @endif
        </ul>
        <ul class="search-card-container clear-fix"></ul>
    </div>
</section>
@endsection