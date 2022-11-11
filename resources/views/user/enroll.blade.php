@extends('layouts.user.main')
@section('content')
    <section class="enroll-sec">
        <div class="l-inner">
            <h1 class="enroll-ttl">{{$course->name}} Course Enroll</h1>
            <p class="enroll-price">Cost : <span class="total-price">{{$course->price}}</span><span class="discount-price" style="display: none; margin-left:10px;">{{$course->price}}</span> Ks</p>
            @if (Session::has('error'))
                <div class="alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span class="msg">Warning : {{Session::get('error')}}</span>
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
                    <div class="text-field clearfix">
                        <div class="coupon-input">
                            <span>Coupon Code</span>
                            <input type="text" name="coupon_code" value="{{old('coupon_code')}}" class="couponCode">
                            <span class="coupon-error"></span>
                            <input type="hidden" class="user_id" value="{{ Auth::user()->id }}">
                        </div>
                        <a href="#" class="coupon-btn">Apply Coupon</a>
                    </div>

                    <button type="submit" class="enroll-btn">Enroll</button>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function(){
            $('.coupon-btn').on("click", function(){
                var code = $('.couponCode').val();
                var user_id = $('.user_id').val();
                var course_name = location.href.split('/')[4]
                $.ajax({
                    url: `http://127.0.0.1:8000/api/coupon`,
                    data: {'code': code,'user_id' : user_id, 'course_name': course_name},
                    type: 'POST',
                    success: function(data){
                        console.log(data);
                        if(data.status == 'success'){
                            $('.coupon-error').text('');
                            $('.total-price').css('text-decoration', 'line-through');
                            $('.discount-price').css('display', 'inline-block').text(data.price);
                        }else {
                            $('.coupon-error').text(data.message);
                            $('.total-price').css('text-decoration', 'none');
                            $('.discount-price').css('display', 'none');
                        }

                    }
                })
            })
        })
    </script>
@endsection
