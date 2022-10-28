@extends('layouts.admin.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card-header">
            <h2 class="card-title">
                My Profile
            </h2>
        </div>
          <div class="card">
            <div class="card-body">
              @if(Session::has('message'))
                <span class="alert alert-success">
                  {{ Session::get('message') }}
                </span>
              @endif
              @if(Session::has('error'))
                <span class="alert alert-danger">
                  {{ Session::get('error') }}
                </span>
              @endif
              <form action="{{ route('admin.profile.change', Auth::id()) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label>Name</label>
                  <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                  @error('name')
                    <br><small class="alert alert-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Email Address</label>
                  <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                  @error('email')
                    <br><small class="alert alert-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Phone Number</label>
                  <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control">
                  @error('phone')
                    <br><small class="alert alert-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Address</label>
                  <input type="text" name="address" value="{{ Auth::user()->address }}" class="form-control">
                  @error('address')
                    <br><small class="alert alert-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Profile Photo</label>
                  <input type="file" name="profile_img" class="form-control">
                  @error('profile_img')
                    <br><small class="alert alert-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-info mr-2">Update</button>
                  <a href="{{ route('admin.password.get') }}">change password?</a>
                </div>
              </form>
            </div>
          </div>
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
