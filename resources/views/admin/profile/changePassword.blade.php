@extends('layouts.admin.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Password Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.profile.get')}}">Profile</a></li>
              <li class="breadcrumb-item active">Password</li>
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
                <i class="fas fa-lock mr-2"></i>Change Password
            </h2>
        </div>
          <div class="card">
            <div class="card-body">
              @if(Session::has('message'))
                <span class="alert alert-success">
                  {{ Session::get('message') }}
                </span>
              </div>
              @endif
              @if(Session::has('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{Session::get('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
            @endif
              <form action="{{ route('admin.password.change', Auth::id()) }}" method="post">
                @csrf
                <div class="mb-3">
                  <label>Old Password</label>
                  <input type="password" name="old_password" placeholder="Enter your old password" class="form-control">
                    @error('old_password')
                        <br><small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                  <label>New Password</label><br>
                  <input type="password" name="new_password" placeholder="Enter new password" class="form-control">
                    @error('new_password')
                        <br><small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                  <label>Confirm Password</label>
                  <input type="password" name="comfirm_password" placeholder="Enter confirm password" class="form-control">
                    @error('comfirm_password')
                        <br><small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3 ml-1">
                  <button type="submit" class="btn btn-secondary">Change</button>
                </div>
              </form>
            </div>
          </div>
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
