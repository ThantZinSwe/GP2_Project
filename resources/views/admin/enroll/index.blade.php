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
              <li class="breadcrumb-item active">Enroll Lists</li>
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
            <h3 class="card-title">Enroll

            </h3>
            <div class="d-flex justify-content-end">
                <a href="{{route('admin.enroll.export')}}" class="btn btn-secondary "> <i class="fas fa-plus-circle mr-2"></i>Export</a>
                &nbsp
                <a href="{{route('admin.enroll.import')}}" class="btn btn-secondary "> <i class="fas fa-plus-circle mr-2"></i>Import</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Course Name</th>
                    <th>Phone</th>
                    <th>Total Price</th>
                    <th>Payment Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="images">
                    @foreach ($enrolls as $key=>$enroll)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$enroll->user->name}}</td>
                        <td>{{$enroll->course->name}}</td>
                        <td>{{$enroll->phone}}</td>
                        <td>{{$enroll->total_price}} Ks</td>
                        <td >
                            @if (isset($enroll->image))
                                <img src="{{asset('images/enroll/'.$enroll->image)}}" alt="" width="100"  style="cursor: pointer">
                            @else

                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge badge-pill badge-danger">{{$enroll->status}}</span>
                        </td>
                        <td class="d-flex border-bottom-0">
                            @if ($enroll->status == "pending")
                                <a href="{{route('admin.enroll.accepted',$enroll->id)}}" class="btn btn-warning btn-sm mr-3">Accepted</a>
                            @endif
                            <form action="{{route('admin.enroll.delete',$enroll->id)}}" method="POST" class="mr-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to want to delete this enroll?')">Delete</button>
                            </form>
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
@section('script')
    <script>
        const gallery = new Viewer(document.getElementById('images'));
    </script>
@endsection
