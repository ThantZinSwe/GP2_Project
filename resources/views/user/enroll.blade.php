@extends('layouts.user.main')
@section('content')
    <section class="enroll-sec">
        <div class="l-inner">
            <h1 class="enroll-ttl">{{$course->name}} Course Enroll</h1>
            <p class="enroll-price">Cost : {{$course->price}} Ks</p>
            @if (Session::has('error'))
                <div class="alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span class="msg">Warning : {{Session::get('error')}}</span>
                    <span class="close-btn">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert">
                    <i class="fa-solid fa-circle-check"></i>
                    <span class="msg">Success : {{Session::get('success')}}</span>
                    <span class="close-btn">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
            @endif

            <div class="form">
                <form action="{{route('user.store.enroll',$course->slug)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="text-field">
                        <span>Payment Image</span>
                        <input type="file" name="image" class="payment-image">
                        @error('image')
                            <span style="color: red;margin-top:10px;">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="text-field">
                        <span>Phone</span>
                        <input type="text" name="phone" value="{{old('phone')}}">
                        @error('phone')
                            <span style="color: red;margin-top:10px;">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="enroll-btn">Enroll</button>
                </form>
            </div>
        </div>
    </section>
@endsection
