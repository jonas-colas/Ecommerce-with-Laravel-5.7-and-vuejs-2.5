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

                              <form action="{{ route('update.product', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                  <label for="title">Title</label>
                                  <input type="text" name="title" class="form-control" id="title" placeholder="Text" value="{{$product->title}}">
                                </div>

                                <div class="form-group">
                                  <label for="textform">Description</label>
                                  <textarea name="description" class="form-control my-editor form-control" rows="10">{{$product->description}}</textarea>
                                </div>

                                <div class="form-group">
                                  <label for="textform">screen size</label>
                                  <textarea name="screen_size" class="form-control">{{$product->screen_size}}</textarea>
                                </div>

                                <div class="form-group">
                                  <label for="textform">item dimensions</label>
                                  <textarea name="item_dimensions" class="form-control">{{$product->item_dimensions}}</textarea>
                                </div>

                                <div class="form-group">
                                  <label for="textform">screen weight</label>
                                  <textarea name="screen_weight" class="form-control">{{$product->screen_weight}}</textarea>
                                </div>

                                <div class="form-group">
                                  <label for="textform">model year</label>
                                  <input type="number" name="model_year" class="form-control" value="{{$product->model_year}}">
                                </div>

                                <div class="form-group">
                                  <label for="textform">resolution</label>
                                  <textarea name="resolution" class="form-control">{{$product->resolution}}</textarea>
                                </div>

                                <div class="form-group">
                                  <label for="textform">total hdmi ports</label>
                                  <input type="number" name="total_hdmi_ports" class="form-control" value="{{$product->total_hdmi_ports}}">
                                </div>

                                <div class="form-group">
                                  <label for="exampleTextarea">Category</label>
                                  @foreach($categories as $category)
                                    <div class="form-check">
                                        <input type="checkbox" name="category[]" value="{{$category->id}}" class="form-check-input"
                                          @foreach($product->categories as $product_category)
                                              @if($category->id === $product_category->id)
                                                checked="checked"
                                              @endif
                                          @endforeach
                                          >
                                          <label class="form-check-label" for="exampleCheck1">{{$category->name}}</label>
                                    </div>
                                  @endforeach<!--endforeach--><br>
                                </div>

                                <div class="form-group">
                                  <label for="exampleTextarea">Tags</label>
                                  <ul class="tags">
                                    @foreach($product_tags as $tag)
                                    <li class="addedTag">{{$tag->name}}<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="{{$tag->name}}"></li>
                                    @endforeach
                                    <li class="tagAdd taglist"><input type="text" id="search-field"></li>
                                  </ul>
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputFile">Feature image</label><br>
                                  <img src="/storage/product_feature_images/{{$product->featureimage['featureimage']}}" style="width:200px; height:200px" alt=""><br><br>
                                  <input type="file" name="featureimage" id="exampleInputFile">
                                </div>

                                <label for="exampleInputFile">Multiple images</label><br>
                                @foreach($product->image as $image)
                                <div class="img-wrap-multiple" id="img-{{$image->id}}" width="100%">
                                  <span class="multiple" aria-hidden="true">&times;</span>
                                  <img src="/storage/product_images/{{$image->images}}" style="width:200px; height:200px" alt="" data-id="{{$image->id}}" data-product="{{$product->id}}"><br><br>
                                </div>
                                @endforeach<br>

                                <div class="input-group control-group increment form-group">
                                  <input type="file" name="multipleimage[]" class="form-control multiple" accept="image/*">
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
                                  <label for="exampleInputFile">Price</label><br>
                                  <input type="number" name="price" class="form-control" value="{{$product->price}}">
                                </div>

                                <div class="form-group">
                                  <label for="textform">Featured</label>
                                  <input type="checkbox" name="featured" checked data-toggle="toggle">
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-floppy-o"></i></button>
                                        <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-trash-o"></i></button>
                                        <button class="btn btn-purple waves-effect waves-light send"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
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
</div>
@stop
    <style>

    </style>
