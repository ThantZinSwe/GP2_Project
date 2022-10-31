@extends('layouts.admin.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Blog Create</li>
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
                      <h3 class="card-title">Create</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('admin.blog.save')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="card-body">
                        <div class="form-group">
                          <label for="blogName">Blog Name</label>
                          <input type="text" name="blogName" class="form-control" id="blogName" placeholder="Enter blog name" >
                          @error('blogName')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Blog Image</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                              </div>
                            </div>
                            @error('image')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="blogContent">Blog Content</label>
                          <textarea type="text" name="blogContent" class="form-control" id="blogContent" placeholder="Enter blog content" ></textarea>
                          @error('blogContent')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
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
