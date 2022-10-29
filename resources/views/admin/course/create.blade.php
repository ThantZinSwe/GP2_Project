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
              <li class="breadcrumb-item active">Course Create</li>
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
                    <form action="{{route('admin.course.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="courseName">Course Name</label>
                          <input type="text" class="form-control" name="name" value="{{old('name')}}"  id="courseName" placeholder="Enter course name">
                          @error('name')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Course Image</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
                            <label for="courseName">Price</label>
                            <input type="number" name="price" class="form-control" value="{{old('price')}}"  id="price" placeholder="Enter price">
                            @error('price')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="courseName">Type</label>
                        <div class="form-group d-flex">
                            <div class="form-check mr-3">
                              <input class="form-check-input" type="radio" name="type" value="free" {{ old('type')=='free' ? 'checked':''}}>
                              <label class="form-check-label">Free</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="type" value="paid"  {{ old('type')=='paid' ? 'checked':''}}>
                              <label class="form-check-label">Paid</label>
                            </div>
                        </div>
                          @error('type')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label>Languages</label>
                            <select class="select2" name="language[]" multiple="multiple" data-placeholder="Select a State"
                                    style="width: 100%;">
                              <option value="">Choose languages...</option>
                                @foreach ($languages as $language)
                                    <option value="{{$language->id}}" {{collect(old('language'))->contains($language->id) ? 'selected' : ''}}>{{$language->name}}</option>
                                @endforeach
                            </select>
                            @error('language')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                             <textarea name="description" class="form-control">{{old('description')}}</textarea>
                            @error('description')
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
