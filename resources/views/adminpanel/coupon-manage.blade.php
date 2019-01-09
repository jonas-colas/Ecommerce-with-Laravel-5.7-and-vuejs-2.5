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
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Title</th>
                                        <th>Delete</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @forelse($coupons as $coupon)
                                        <tr>
                                          <td class="col-md-3">{{$coupon->code}}</td>
                                          <form action="{{ route('destroy.coupon', ['id' => $coupon->id])}}" method="get">
                                            <td><button type="submit" class="btn btn-danger">Delete</button></td>
                                          @csrf
                                          </form>
                                        </tr>
                                      @empty
                                      <h1>No coupons found</h1>
                                      @endforelse
                                    </tbody>
                                  </table>
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
