@extends('layouts.user.main')
@section('content')
    <section class="enroll-sec">
        <div class="l-inner">
            <h1 class="enroll-ttl">{{$course->name}} Course Enroll</h1>


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
                <form action="{{route('user.store.enroll',$course->slug)}}" method="POST">
                    @csrf
                    <div class="text-field">
                        <span>Amount</span>
                        <input type="number" name="amount" value="{{old('amount')}}">
                        @error('amount')
                            <span style="color: red;margin-top:10px;">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="text-field">
                        <span>Payment Method</span>
                        <select name="payment" id="">
                            <option value="">Choose Payment Method...</option>
                            <option value="card" {{old('payment') == "card" ? 'selected' : ''}}>Card</option>
                            <option value="cash" {{old('payment') == "cash" ? 'selected' : ''}}>Cash</option>
                            <option value="kpay" {{old('payment') == "kpay" ? 'selected' : ''}}>Kpay</option>
                        </select>
                        @error('payment')
                            <span style="color: red;margin-top:10px;">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="enroll-btn">Enroll</button>
                </form>
            </div>
        </div>
    </section>
@endsection
