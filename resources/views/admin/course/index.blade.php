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
        <div class="card">
          <div class="card-header ">
            <h3 class="card-title">Courses

            </h3>
            <div class="d-flex justify-content-end">
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
                    <th>Type</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>183</td>
                    <td>Laravel Basic</td>
                    <td>
                        <span class="badge badge-info">Laravel</span>
                        <span class="badge badge-info">PHP</span>
                    </td>
                    <td>image</td>
                    <td>Free</td>
                    <td>0Ks</td>
                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non sint officiis quidem, soluta minima totam sequi sit quasi quia at aliquam dolore vero molestiae consectetur debitis quas, earum suscipit modi?</td>
                    <td class="d-flex border-bottom-0">
                        <a href="#" class="btn btn-warning btn-sm mr-3">Edit</a>
                        <form action="#" >
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                  </tr>

                  <tr>
                    <td>183</td>
                    <td>Laravel Basic</td>
                    <td>
                        <span class="badge badge-info">Laravel</span>
                        <span class="badge badge-info">PHP</span>
                    </td>
                    <td>image</td>
                    <td>Free</td>
                    <td>0Ks</td>
                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non sint officiis quidem, soluta minima totam sequi sit quasi quia at aliquam dolore vero molestiae consectetur debitis quas, earum suscipit modi?</td>
                    <td class="d-flex border-bottom-0">
                        <a href="#" class="btn btn-warning btn-sm mr-3">Edit</a>
                        <form action="#" >
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                  </tr>
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
