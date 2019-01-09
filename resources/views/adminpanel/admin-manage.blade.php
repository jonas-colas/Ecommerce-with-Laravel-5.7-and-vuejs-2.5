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
                                  <input type="text" name="search" class="fa fa-search" placeholder="Search..">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($admins as $admin)
                                        <tr >
                                          <td class="col-md-3">{{$admin->email}}</td>
                                          <td><a href="{{ route('edit.admin', ['id' => $admin->id]) }}"><button type="button" class="btn btn-info edit">Edit</button></a></td>
                                          <td><button type="button" class="btn btn-danger delete-category">Delete</button></td>
                                        </tr>
                                      @endforeach
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
