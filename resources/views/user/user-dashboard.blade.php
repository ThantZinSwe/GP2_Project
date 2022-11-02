@extends('layouts.user.main')
@section('content')
<section class="sec-user-dashboard">
    <div class="l-inner">
        <div class="dashboard-mv-blk">
            <h2 class="dashboard-ttl">User Dashboard</h2>
            @if (Session::has('error'))
                <div class="alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span class="msg">Warning : {{Session::get('error')}}</span>
                    <span class="close-btn">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
            @endif
            @error('comfirm_password')
                <div class="alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span class="msg">Warning : {{ $message }}</span>
                    <span class="close-btn">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
            @enderror
            @if (Session::has('message'))
                <div class="alert">
                    <i class="fa-solid fa-circle-check"></i>
                    <span class="msg">Success : {{Session::get('message')}}</span>
                    <span class="close-btn">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
            @endif
            <div class="dashboard-card clearfix">
                <ul class="dashboard-aside" >
                    <li><a href="#user-edit-profile">Edit Profile</a></li>
                    <li><a href="#user-password">Password</a></li>
                    <li><a href="#user-course" >My Course</a></li>
                    <div class="divider"></div>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
                <div class="dashboard-content">
                    <div id="user-edit-profile" class="dashboard-blk">
                        <form action="{{ route('user.profile.post', Auth::id()) }}" method="POST" class="clearfix">
                            @csrf
                            <div class="profile-input-group">
                                <label for="">Name</label>
                                <input type="text" value="{{ Auth::user()->name }}" name="name">
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="profile-input-group">
                                <label for="">Email</label>
                                <input type="email" value="{{ Auth::user()->email }}" name="email">
                                @error('email')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                           <div class="profile-input-group">
                                <label for="">Phone</label>
                                <input type="text" value="{{ Auth::user()->phone }}" name="phone">
                                @error('phone')
                                <span class="error">{{ $message }}</span>
                                @enderror
                           </div>
                           <div class="profile-input-group">
                                <label for="">Address</label>
                                <textarea name="address" id="" cols="30" rows="10">{{ Auth::user()->address }}</textarea>
                                @error('address')
                                <span class="error">{{ $message }}</span>
                                @enderror
                           </div>
                           <button type="submit">Save Profile</button>
                        </form>
                    </div>
                    <div id="user-password" class="dashboard-blk">
                        <form action="{{ route('user.password.change', Auth::id()) }}" method="POST" class="clearfix">
                            @csrf
                            <div class="profile-input-group">
                                <label for="">Old Password</label>
                                <input type="password" name="old_password">
                                @error('old_password')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="profile-input-group">
                                <label for="">New Password</label>
                                <input type="password" name="new_password">
                                @error('new_password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="profile-input-group">
                                <label for="">Comfirm Password</label>
                                <input type="password" name="comfirm_password">
                                @error('comfirm_password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                           <button type="submit">Change Password</button>
                        </form>
                    </div>
                    <div id="user-course" class="dashboard-blk">
                        <h2>My Courses</h2>
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
                                {{ $courses->links()}}
                            @else
                                <span style="text-align: center; font-size: 20px;">There is no Courses Availible!</span>
                            @endif
                           
                        </ul>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection