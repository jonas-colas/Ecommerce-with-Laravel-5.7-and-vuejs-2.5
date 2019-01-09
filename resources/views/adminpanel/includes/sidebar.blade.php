<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-devider"></li>
            <li class="nav-label">Home</li>
            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{ route('admin.panel') }}">Ecommerce </a></li>
                    <li><a href="index1.html">Analytics </a></li>
                </ul>
            </li>
            <li class="nav-label">Features</li>
            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Posts</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{ route('create.product') }}">Create posts</a></li>
                    <li><a href="{{ route('index.product') }}">Manage posts</a></li>
                </ul>
            </li>
            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Category</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{ route('create.category') }}">Create category</a></li>
                    <li><a href="{{ route('index.category') }}">Manage categories</a></li>
                </ul>
            </li>
            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Slider</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{ route('create.slider') }}">Create slider</a></li>
                    <li><a href="{{ route('index.slider') }}">Manage sliders</a></li>
                </ul>
            </li>
            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">coupons</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{ route('create.coupon') }}">Create coupon</a></li>
                    <li><a href="{{ route('index.coupon') }}">Manage coupons</a></li>
                </ul>
            </li>
            <li class="nav-label">Layout</li>
            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-columns"></i><span class="hide-menu">Admins</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{ route('create.admin') }}">Create new admin</a></li>
                    <li><a href="{{ route('index.admin') }}">Manage admins</a></li>
                </ul>
            </li>
            <li class="nav-label">EXTRA</li>
            <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Orders</span></a>
              <ul aria-expanded="false" class="collapse">
                  <li><a href="{{ route('index.order')}}">Orders</a></li>
                  <li><a href="{{ route('status.order', ['status' => 'pending'])}}">Pending</a></li>
                  <li><a href="{{ route('status.order', ['status' => 'treating'])}}">Treating</a></li>
                  <li><a href="{{ route('status.order', ['status' => 'sent'])}}">Sent</a></li>
                  <li><a href="{{ route('status.order', ['status' => 'problem'])}}">Problem</a></li>
                  <li><a href="{{ route('status.order', ['status' => 'refunded'])}}">refunded</a></li>
              </ul>
            </li>
            <li class="nav-label">
              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" style="width:100%">Logout</button>
              </form>
            </li>
            <li class="nav-label">
                <a href="/"><button class="btn btn-info" style="width:100%">Go home</button></a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
