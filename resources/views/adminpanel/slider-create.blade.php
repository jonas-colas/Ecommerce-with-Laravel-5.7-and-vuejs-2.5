@extends('adminpanel.includes.header')

@section('title', 'admin')

@section('main_content')

<!-- Left Sidebar  -->
<div class="left-sidebar">
  @include('adminpanel.includes.sidebar')
</div>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
  <!-- Bread crumb -->
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-primary">Dashboard</h3> </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
          </ol>
      </div>
  </div>
  <!-- End Bread crumb -->
  <!-- Container fluid  -->
  <div class="container-fluid">
      <!-- Start Page Content -->
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <div class="card-content">
                        <div class="mt-4">
                          @if (count($errors) > 0)
                          <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                          @endif

                          @if(session('success'))
                          <div class="alert alert-success">
                            {{ session('success') }}
                          </div>
                          @endif

                          <form action="{{ route('store.slider')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="exampleInputFile">Insert images for sliders</label><br>
                            <div class="input-group control-group increment form-group">
                              <input type="file" name="multipleimage[]" class="form-control">
                              <div class="input-group-btn">
                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                              </div>
                            </div>

                            <div class="clone hide form-group">
                              <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="multipleimage[]" class="form-control">
                                <div class="input-group-btn">
                                  <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="title">Small title</label>
                              <input type="text" name="small_title" class="form-control" id="title" placeholder="Small title">
                            </div>

                            <div class="form-group">
                              <label for="title">Big title</label>
                              <input type="text" name="big_title" class="form-control" id="title" placeholder="Big title">
                            </div>

                            <div class="form-group m-b-0">
                                <div class="text-right">
                                    <input type="submit" class="btn btn-purple waves-effect waves-light" value="Send">
                                </div>
                            </div>

                          </form>

                        </div>
                        <!-- end card-->
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End PAge Content -->
  </div>
  <!-- End Container fluid  -->
</div>
<!-- End Page wrapper  -->
</div>
@stop
