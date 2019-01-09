@extends('adminpanel.includes.header')

@section('title', 'admin')

@section('main_content')

<!-- Left Sidebar  -->
<div class="left-sidebar">
  @include('adminpanel.includes.sidebar')
</div>
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
                                <label for="exampleInputFile">Sliders</label><br>
                                @forelse($sliders as $image)
                                <div class="img-wrap img-wrap-slide" id="img-{{$image->id}}" width="100%">
                                  <span class="close slide" aria-hidden="true">&times;</span>
                                  <img src="/storage/product_sliders/{{$image->images}}" style="width:200px; height:200px" alt="" data-id="{{$image->id}}" data-image="{{$image->id}}"><br><br>
                                </div>
                                @empty
                                  <input type="hidden" class="hiddenvalue" value="full">
                                @endforelse<br>
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
</div>
@stop
