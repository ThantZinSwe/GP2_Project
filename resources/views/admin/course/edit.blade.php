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
              <li class="breadcrumb-item active">Course Edit</li>
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
                    <form action="{{route('admin.course.update',$course->slug)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="courseName">Course Name</label>
                          <input type="text" name="name" class="form-control" value="{{old('name',$course->name)}}" id="courseName" placeholder="Enter course name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" value="{{old('price',$course->price)}}" id="price" placeholder="Enter price">
                            @error('price')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="type">Type</label>
                            <div class="form-group d-flex">
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="type" value="free" {{old('type',$course->type) == 'free' ? 'checked' : ''}}>
                                    <label class="form-check-label">Free</label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="paid" {{old('type',$course->type) == 'paid' ? 'checked' : ''}}>
                                    <label class="form-check-label">Paid</label>
                                  </div>
                            </div>
                            @error('type')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Languages</label>
                            <select class="select2" name="language[]" multiple="multiple" style="width: 100%;">
                              <option value="">Choose Languages...</option>
                              @foreach ($languages as $language)
                                <option value="{{$language->id}}"
                                    @foreach ($course->languages as $course_language)
                                        {{collect(old('language', $course_language->id))->contains($language->id) ? 'selected' : ''}}
                                    @endforeach>
                                    {{$language->name}}
                                </option>
                              @endforeach
                            </select>
                            @error('language')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                             <textarea name="description" class="form-control">{{old('description',$course->description)}}</textarea>
                            @error('description')
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
