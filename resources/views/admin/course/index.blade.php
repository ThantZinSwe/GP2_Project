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
              <li class="breadcrumb-item active">Course Lists</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <div class="card">
          <div class="card-header ">
            <h3 class="card-title">Courses

            </h3>
            <div class="d-flex justify-content-end">
                <form action="#" class="mr-3 mt-1">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Search Course...">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info">Search</button>
                        </span>
                    </div>
                </form>
                <a href="{{route('admin.course.create')}}" class="btn btn-secondary "> <i class="fas fa-plus-circle mr-2"></i> Course Create</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Language</th>
                    <th>Image</th>
                    <th>Course Video Count</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $key=>$course)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$course->name}}</td>
                        <td>
                            @foreach ($course->languages as $language)
                                <span class="badge badge-info">{{$language->name}}</span>
                            @endforeach
                        </td>
                        <td>
                            <img src="{{asset('images/course/'.$course->image)}}" alt="{{$course->name}}" width="50">
                        </td>
                        <td class="text-center">
                            <span class="badge badge-pill badge-danger">{{$course->courseVideos->count()}}</span>
                        </td>
                        <td>{{$course->type}}</td>
                        <td>{{$course->price}} Ks</td>
                        <td>
                            <span class="d-inline-block text-truncate" style="max-width: 150px;">{{$course->description}}</span>
                        </td>
                        <td class="d-flex border-bottom-0">
                            <a href="{{route('admin.course.edit',$course->slug)}}" class="btn btn-warning btn-sm mr-3">Edit</a>
                            <form action="{{route('admin.course.delete',$course->slug)}}" method="POST" class="mr-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to want to delete this course?')">Delete</button>
                            </form>
                            <a href="{{route('admin.courseVideo.index',$course->slug)}}" class="btn btn-primary btn-sm mr-3">Course Video</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
