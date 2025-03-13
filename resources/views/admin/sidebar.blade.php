<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="admincss/img/me.jpg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">{{Auth::user()->name}}</h1>
            <p>{{Auth::user()->usertype}}</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class=" {{ Request::routeIs('home') || Request::routeIs('admin.home')  ? 'active' : '' }}"><a href="{{route('admin.home')}}"> <i class="icon-home"></i>Home </a></li>
        <li class="{{ Request::routeIs('admin.post.create') ? 'active' : '' }}"><a href="{{route('admin.post.create')}}"> <i class="icon-grid"></i>Add Blog </a></li>
        <li class="{{ Request::routeIs('admin.post.index') ? 'active' : '' }}"><a href="{{route('admin.post.index')}}"> <i class="fa fa-bar-chart"></i>Show Blog </a></li>
    </ul>
</nav>
