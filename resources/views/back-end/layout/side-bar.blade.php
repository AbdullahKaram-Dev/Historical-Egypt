<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    @if(auth()->user()->group == 'owner')
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Users</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i> All Users</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Messages</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('contactuss')}}"><i class="fa fa-circle-o"></i> All Messages</a></li>
            </ul>
        </li>

    @endif
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Home Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <li><a href="{{route('homepages.index')}}"><i class="fa fa-circle-o"></i>All Content</a></li>
            <li><a href="{{route('homepages.create')}}"><i class="fa fa-circle-o"></i>Add New Content</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Sliders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <li><a href="{{route('sliders.index')}}"><i class="fa fa-circle-o"></i>All Slider</a></li>
            <li><a href="{{route('sliders.create')}}"><i class="fa fa-circle-o"></i>Add New Slider</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>pharaonic</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('pharaonics.index')}}"><i class="fa fa-circle-o"></i>All Posts</a></li>
            <li><a href="{{route('pharaonics.create')}}"><i class="fa fa-circle-o"></i>Add new Post</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Coptic</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('coptics.index')}}"><i class="fa fa-circle-o"></i> All Posts</a></li>
            <li><a href="{{route('coptics.create')}}"><i class="fa fa-circle-o"></i> Add New Post</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Modern</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('moderns.index')}}"><i class="fa fa-circle-o"></i> All Posts</a></li>
            <li><a href="{{route('moderns.create')}}"><i class="fa fa-circle-o"></i> Add New Post</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>islamic</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('islamics.index')}}"><i class="fa fa-circle-o"></i> All Posts</a></li>
            <li><a href="{{route('islamics.create')}}"><i class="fa fa-circle-o"></i> Add New Post</a></li>
        </ul>
    </li>

</ul>
