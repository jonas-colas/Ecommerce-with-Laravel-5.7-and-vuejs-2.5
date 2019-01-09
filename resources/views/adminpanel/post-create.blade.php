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

                          <form id="form" action="{{ route('store.product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" name="title" class="form-control" id="title" placeholder="Text">
                            </div>

                            <div class="form-group">
                              <label for="textform">short description</label>
                              <textarea name="short_description" class="form-control" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                              <label for="textform">Description</label>
                              <textarea name="description" class="form-control my-editor" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                              <label for="textform">screen size</label>
                              <textarea name="screen_size" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                              <label for="textform">item dimensions</label>
                              <textarea name="item_dimensions" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                              <label for="textform">screen weight</label>
                              <textarea name="screen_weight" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                              <label for="textform">model year</label>
                              <input type="number" name="model_year" class="form-control" id="price">
                            </div>

                            <div class="form-group">
                              <label for="textform">resolution</label>
                              <textarea name="resolution" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                              <label for="textform">total hdmi ports</label>
                              <input type="number" name="total_hdmi_ports" class="form-control" id="price">
                            </div>

                            <div class="form-group">
                              <label for="exampleTextarea">Category</label>
                              @forelse($categories as $category)
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="category[]" value="{{$category->id}}"> {{$category->name}}
                                </label>
                              </div>
                              @empty
                              <p>no category was founded. Please add new category <a href="{{ route('create.category')}}">here</a></p>
                              @endforelse<!--endforeach--><br>
                            </div>
                            <div class="form-group">
                              <label for="exampleTextarea">Tags</label>
                              <ul class="tags">
                                <li class="addedTag">Sony<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="SEO"></li>
                                <li class="tagAdd taglist"><input type="text" id="search-field"></li>
                              </ul>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputFile">Feature image</label><br>
                              <input type="file" name="featureimage" class="form-control">
                            </div>

                            <label for="exampleInputFile">Multiple images</label><br>
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
                              <label for="exampleInputFile">Price</label><br>
                              <input type="number" name="price" class="form-control" id="price">
                            </div>

                            <div class="bootstrap-switch-square">
                              <label for="exampleInputFile">Featured:</label><br>
                              <input type="checkbox" name="featured" value="1" />
                            </div>

                            <div class="form-group m-b-0">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Send</button>
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
<style>
.tags {
background: none repeat scroll 0 0 #fff;
border: 1px solid #ccc;
display: table;
padding: 0.5em;
width: 100%;
}
.tags li.tagAdd, .tags li.addedTag {
float: left;
margin-left: 0.25em;
margin-right: 0.25em;
}
.tags li.addedTag {
background: none repeat scroll 0 0 #019f86;
border-radius: 2px;
color: #fff;
padding: 0.25em;
}
.tags input, li.addedTag {
border: 1px solid transparent;
border-radius: 2px;
box-shadow: none;
display: block;
padding: 0.5em;
}
.tags input:hover {
border: 1px solid #000;
}
span.tagRemove {
cursor: pointer;
display: inline-block;
padding-left: 0.5em;
}
span.tagRemove:hover {
color: #222222;
}
H1 {
text-align: center;
}
p {
color: #ccc;
}
h1 {
color: #6b6b6b;
font-size: 1.5em;
}

</style>
