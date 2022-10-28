@extends('layouts.admin.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Course Video</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.course.index')}}">Course</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.courseVideo.index',$course->slug)}}">Course Video</a></li>
              <li class="breadcrumb-item active">Course Video Edit</li>
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
                      <h3 class="card-title">{{$course->name}} Course Video Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.courseVideo.update',[$course->slug,$courseVideo->slug])}}" method="POST">
                        @csrf
                        @method('PUT')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="courseVideoName">Course Video Name</label>
                          <input type="text" name="name" class="form-control" value="{{old('name',$courseVideo->name)}}" id="courseVideoName" placeholder="Enter course video name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" name="url" class="form-control" value="{{old('url',$courseVideo->url)}}" id="url" placeholder="Enter course video url">
                            @error('url')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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
