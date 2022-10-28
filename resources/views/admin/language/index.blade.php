@extends('layouts.admin.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Languages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Languages Lists</li>
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
            <h3 class="card-title">Languages

            </h3>
            <div class="d-flex justify-content-end">
                <a href="{{route('admin.language.create')}}" class="btn btn-secondary "> <i class="fas fa-plus-circle mr-2"></i> Language Create</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Language</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($languages as $language)
                  <tr>
                    <td>{{ $language->id }}</td>
                    <td>
                        <span class="badge badge-info">{{ $language->name }}</span>
                    </td>
                    <td class="d-flex border-bottom-0">
                        <a href="{{route('admin.language.edit',"$language->slug") }}" class="btn btn-warning btn-sm mr-3">Edit</a>
                        <form action="{{ route('admin.language.delete',"$language->slug") }}" method="POST" >
                          @method("delete")
                          @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
