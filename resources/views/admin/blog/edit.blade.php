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
              <li class="breadcrumb-item active">Blog Edit</li>
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
                      <h3 class="card-title">Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('admin.blog.update',$edit_slug)}}">
                      {{ csrf_field() }}
                      <div class="card-body">
                        <div class="form-group">
                          <label for="editName">Blog Title</label>
                          <input type="text" name="editName" class="form-control" id="editName" placeholder="Enter blog name"  value="{{$edit_title}}" required>
                        </div>
                        @error('editName')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="form-group">
                          <label for="editContent">Blog Content</label>
                          <textarea type="text" name="editContent" class="form-control" id="editContent" placeholder="Enter blog content" required>{{$edit_content}}</textarea>
                        </div>
                        @error('editContent')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
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
