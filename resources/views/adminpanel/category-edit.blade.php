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

                          <form action="{{ route('update.category', ['id' => $category->id])}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="title">cateogry name</label>
                              <input type="text" name="category" class="form-control" id="title" value="{{$category->name}}">
                            </div>
                            <div class="form-group m-b-0">
                                <div class="text-right">
                                  <button class="btn btn-purple waves-effect waves-light"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
                                </div>
                            </div>
                          </form>
                      </div>
                      <!-- end card-->
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
</div>
<!-- End Page wrapper  -->
@stop
