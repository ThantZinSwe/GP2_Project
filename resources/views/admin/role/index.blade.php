@extends('layouts.admin.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Roles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Role Lists</li>
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
            <h3 class="card-title">Role

            </h3>
            
            <div class="d-flex justify-content-end">
                <a href="{{route('admin.role.create')}}" class="btn btn-secondary "> <i class="fas fa-plus-circle mr-2"></i> Role Create</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                   <th>Role Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($roles as $no => $r)
                  <tr>
                    <td>{{++$no}}</td>
                    <td>{{$r->name}}</td>
                    <td class="d-flex border-bottom-0">
                        <a href="{{route('admin.role.edit',$r->id)}}" class="btn btn-warning btn-sm mr-3">Edit</a>
                       
                        <form method="post" action="{{route('admin.role.delete',$r->id)}}" >
                        {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to want to delete this role?')" name="delete">Delete</button>
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
