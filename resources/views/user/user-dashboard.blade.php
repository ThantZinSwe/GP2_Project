@extends('layouts.user.main')
@section('content')
<section class="sec-user-dashboard">
    <div class="main-visual">
        <h2 class="dashboard-ttl">User Dashboard</h2>
    </div>
    <div class="l-inner dashboard-l-inner">
        <div class="dashboard-mv-blk">
            
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
                <script>
                    
                </script>
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
                        <form action="{{ route('user.profile.post', Auth::id()) }}" method="POST" class="clearfix" enctype="multipart/form-data">
                            @csrf
                            <div class="profile-img-container">
                                <span class="profile-name"><i class="fa-solid fa-circle-xmark"></i>{{Session::get('acronym')}}</span>
                                <div class="wrap-custom-file">
                                    <input type="file" name="profile_img" id="image1" accept=".gif, .jpg, .png" />
                                    <label  for="image1">
                                        <span id="custom-file">Upload Profile Photo</a>
                                    </label>
                                    @error('profile_img')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                   
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
                        <ul class="card clearfix">
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
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection