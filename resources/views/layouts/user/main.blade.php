<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CoderCamp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500;600;700&family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/user/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/common.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/course-details.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/course.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/blog.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/enroll.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/blogdetail.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/user-dashboard.css')}}">
</head>
<body>
    {{-- Header --}}
    <section class="sec-mv">
        <header class="header">
            <div class="l-inner clearfix">
              <h1 class="header-logo">
                <a href="{{route('user.home')}}">
                  <span class="title-1">C</span><span>oder<span class="title-1">C</span><span>amp</span></span>
                </a>
              </h1>
              <nav class="g-nav">
                <ul class="clearfix">
                    <li><a href="{{route('user.home')}}" class="text {{'/' == request()->path() ? 'nav-active' : ''}}">Home</a></li>
                    <li><a href="{{ route('user.course') }}" class="text {{'courses' == request()->path() ? 'nav-active' : ''}}" >Courses</a></li>
                    <li><a href="{{route('user.blog')}}" class="text  {{'blog' == request()->path() ? 'nav-active' : ''}}">Blogs</a></li>
                    @guest
                        <li><a href="{{ route('login.get') }}" class="btn btn-outline-primary sign-in">Sign in</a></li>
                        <li><a href="{{ route('auth.register') }}" class="btn btn-primary">Register</a></li>
                    @endguest
                    @auth
                    <li class="dropdown clickme">
                        {{--<img src="{{asset('images/default_profile.jpg')}}" alt="User" class="user-pic">--}}
                        @php
                            $words = explode(" ", Auth::user()->name );
                            $acronym = "";
                            if(count($words) == 1){
                               $acronym = strtoupper(mb_substr($words[0], 0, 2));
                               Session::put('acronym', $acronym);
                            }else {
                                foreach ($words as $i => $w) {
                                    if($i < 2){
                                        $acronym .= strtoupper(mb_substr($w, 0, 1));
                                    }
                                }
                                Session::put('acronym', $acronym);
                            }

                        @endphp
                        <span class="profile-name">{{ $acronym ?? ''}}</span>
                        <div class="dd-menu">
                            <div class="dd-left">
                                <ul>
                                    <li><i class="fa-solid fa-house-user"></i></li>
                                    <li><i class="fa-solid fa-right-from-bracket"></i></li>
                                </ul>
                            </div>
                            <div class="dd-right">
                                <ul>
                                    <li><a href="{{ route('user.dashboard') }}">User Dashboard</a></li>
                                    <li><a href="{{ route('logout') }}">Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endauth
                </ul>

              </nav>
                <p class="profile-toggle">
                    @php
                        if(isset($acronym)){
                            echo "<span class='profile-toggle-name'>$acronym</span>";
                        }
                    @endphp

                    <div class="dropdown profile-nav">
                        <i class="fa-solid fa-xmark fa-xl profile-close-toggle"></i>
                        <li class="profile-list">
                            <a href="#" class="user-dashboard">
                                <i class="fa-solid fa-house-user"></i>
                                User Dashboard
                                <i class="fa-solid fa-angle-down down"></i>
                            </a>
                            <ul class="profile-sublist">
                                <li>
                                  <a href="#user-edit-profile" >
                                    <i class="fa-solid fa-user-pen"></i>
                                    <span>Edit Profile</span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#user-password">
                                    <i class="fa-solid fa-lock"></i>
                                    <span>Password</span>
                                  </a>
                                </li>
                                <li>
                                    <a href="#user-course">
                                    <i class="fa-solid fa-code"></i>
                                      <span>My Course</span>
                                    </a>
                                </li>
                              </ul>
                        </li>
                        <li class="profile-list">
                            <a href="{{ route('logout') }}">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Sign Out
                            </a>
                        </li>
                    </div>
                </p>
                <p class="menu-toggle profile-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </p>
            </div>
        </header>
    </section>
    @yield('content')

    {{-- Footer --}}
    <section class="footer">
        <div class="l-inner clearfix">
            <div class="logo-blk">
                <h4 class="footer-logo">
                    <a href="{{route('user.home')}}">
                        <span class="title-1">C</span><span>oder<span class="title-1">C</span><span>amp</span></span>
                      </a>
                </h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi nihil quaerat a nam! Suscipit id sequi praesentium labore veniam, fugit quia necessitatibus perferendis nam vero esse tenetur vel expedita velit?</p>
            </div>

            <div class="footer-nav">
                <h5>Navigation</h5><br>
                <ul>
                    <li><a href="{{route('user.home')}}">Home</a></li>
                    <li><a href="{{route('user.blog')}}">Blogs</a></li>
                    <li><a href="{{ route('user.course') }}">Courses</a></li>
                </ul>
            </div>

            <div class="team">
                <h5>Created By</h5><br>
                <ul>
                    <li><span>Thant Zin Swe</span></li>
                    <li><span>Than Hla Oo</span></li>
                    <li><span>Hnin Moh Moh Lwin</span></li>
                    <li><span>Nandar Khaing</span></li>
                </ul>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{asset('library/jquery.heightLine.js')}}"></script>
    <script src="{{asset('js/user/common.js')}}"></script>
    <script src="{{asset('js/user/blog.js')}}"></script>
    <script src="{{ asset('js/user/course.js') }}"></script>
    <script src="{{ asset('js/user/review.js') }}"></script>
    <script src="{{ asset('js/user/user-dashboard.js') }}"></script>
    <script src="{{asset('js/user/home.js')}}"></script>
</body>
<script>
    $(document).ready(function(){

        let token = document.head.querySelector('meta[name="csrf-token"]');
        if(token){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN':token.content
                }
            });
        }else{
            console.error('csrf token not found');
        }

        $('.alert .close-btn').on('click',function(){
            $('.alert').addClass('hide');
        });

        $('.alert-error .close-btn').on('click',function(){
            $('.alert-error').addClass('hide');
        });
    });

</script>
@yield('script')
</html>
