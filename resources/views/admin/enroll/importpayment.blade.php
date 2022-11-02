@extends('layouts.admin.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Import Payment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Import Payment</li>
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
                      <h3 class="card-title">Import</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('admin.enroll.get')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="card-body">
                      <div class="form-group">
                      <div class="input-group">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" name="file" 
                          id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose 
                            import file</label>
                      </div>
                      </div>
                      @error('file')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                      <!-- /.card-body -->
                      <div class="card-footer">
                      <button type="submit" class="btn-import btn btn-primary">Import</button>
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
