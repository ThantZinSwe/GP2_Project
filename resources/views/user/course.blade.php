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
                    <option value="">All</option>
                    <option value="">Paid</option>
                    <option value="">Free</option>
                    <input type="text" class="search-input" placeholder="Search For Courses">
                </select>

            </div>
            <ul class="language-list">
                <li class="active"><a href="#">All</a></li>
                <li><a href="#">PHP</a></li>
                <li><a href="#">Javascript</a></li>
                <li><a href="#">Laravel</a></li>
                <li><a href="#">Python</a></li>
                <li><a href="#">Tools</a></li>
                <li><a href="#">Vue Js</a></li>
                <li><a href="#">Java</a></li>
                <li><a href="#">Flutter</a></li>
                <li><a href="#">Angular</a></li>
                <li><a href="#">Dart</a></li>
            </ul>
        </div>
        <ul class="course-card-container clear-fix">
            <li class="course-card">
                <a href="#">
                    <img src="{{ asset('images/admin/1667046834.png') }}" alt="" class="course-card-img">
                    <div class="course-txt-blk">
                        <h3 class="course-card-ttl">PHP Framwork thinking</h3>
                        <p class="course-card-type">Type: <span>Free</span></p>
                        <p class="course-card-fee">Fee: <span>0 Ks</span></p>
                        <ul class="course-card-language">
                            <li>Laravel</li>
                            <li>PHP</li>
                        </ul>
                    </div>
                </a>
            </li>
            <li class="course-card">
                <a href="#">
                    <img src="{{ asset('images/admin/1667046834.png') }}" alt="" class="course-card-img">
                    <div class="course-txt-blk">
                        <h3 class="course-card-ttl">PHP Framwork thinking</h3>
                        <p class="course-card-type">Type: <span>Free</span></p>
                        <p class="course-card-fee">Fee: <span>0 Ks</span></p>
                        <ul class="course-card-language">
                            <li>Laravel</li>
                            <li>PHP</li>
                        </ul>
                    </div>
                </a>
            </li>
            <li class="course-card">
                <a href="#">
                    <img src="{{ asset('images/admin/1667046834.png') }}" alt="" class="course-card-img">
                    <div class="course-txt-blk">
                        <h3 class="course-card-ttl">PHP Framwork thinking</h3>
                        <p class="course-card-type">Type: <span>Free</span></p>
                        <p class="course-card-fee">Fee: <span>0 Ks</span></p>
                        <ul class="course-card-language">
                            <li>Laravel</li>
                            <li>PHP</li>
                        </ul>
                    </div>
                </a>
            </li>
            <li class="course-card">
                <a href="">
                    <img src="{{ asset('images/admin/1667046834.png') }}" alt="" class="course-card-img">
                    <div class="course-txt-blk">
                        <h3 class="course-card-ttl">PHP Framwork thinking</h3>
                        <p class="course-card-type paid">Type: <span>Paid</span></p>
                        <p class="course-card-fee paid">Fee: <span>20000 Ks</span></p>
                        <ul class="course-card-language">
                            <li>Laravel</li>
                            <li>PHP</li>
                        </ul>
                    </div>
                </a>
            </li>
            <li class="course-card">
               <a href="">
                <img src="{{ asset('images/admin/1667046834.png') }}" alt="" class="course-card-img">
                <div class="course-txt-blk">
                    <h3 class="course-card-ttl">PHP Framwork thinking</h3>
                    <p class="course-card-type">Type: <span>Free</span></p>
                    <p class="course-card-fee">Fee: <span>0 Ks</span></p>
                    <ul class="course-card-language">
                        <li>Laravel</li>
                        <li>PHP</li>
                    </ul>
                </div>
               </a>
            </li>
            <li class="course-card">
               <a href="">
                <img src="{{ asset('images/admin/1667046834.png') }}" alt="" class="course-card-img">
                <div class="course-txt-blk">
                    <h3 class="course-card-ttl">PHP Framwork thinking</h3>
                    <p class="course-card-type paid">Type: <span>Paid</span></p>
                    <p class="course-card-fee paid">Fee: <span>20000 Ks</span></p>
                    <ul class="course-card-language">
                        <li>Laravel</li>
                        <li>PHP</li>
                    </ul>
                </div>
               </a>
            </li>
        </ul>
    </div>
</section>
@endsection
