@extends('layouts.admin.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Coupon</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Coupon Update</li>
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
                    <form method="post" action="{{ route('admin.coupon.update', $coupon->id) }}" >
                        @csrf
                        @method('PUT')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="couponCode">Coupon Code</label>
                          <input type="text" name="couponCode" class="form-control" id="couponCode" placeholder="Enter coupon code" value="{{ old('couponCode', $coupon->code) }}">
                          @error('couponCode')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label for="discount">Discount</label>
                          <input type="number" name="discount" class="form-control" id="discount" placeholder="Enter coupon content" value="{{ old('discount', $coupon->discount) }}" >
                          @error('discount')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
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
