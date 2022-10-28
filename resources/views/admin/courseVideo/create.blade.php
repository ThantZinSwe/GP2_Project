@extends('layouts.admin.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Courses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.course.index')}}">Course</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.courseVideo.index',$course->slug)}}">Course Video</a></li>
              <li class="breadcrumb-item active">Course Video Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8 col-md-8 offset-2">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">{{$course->name}} Course Video Create</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.courseVideo.store',$course->slug)}}" method="POST">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="courseName">Course Video Name</label>
                          <input type="text" class="form-control" name="name" value="{{old('name')}}"  id="courseVideoName" placeholder="Enter course video name">
                          @error('name')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="courseName">Url</label>
                            <input type="text" name="url" class="form-control" value="{{old('url')}}"  id="url" placeholder="Enter course video url">
                            @error('url')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
          <!-- /.card -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
