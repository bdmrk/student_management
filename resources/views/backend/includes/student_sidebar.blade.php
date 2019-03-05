<aside class="sidebar-left">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="{{route('dash')}}"><span class="fas fa-chalkboard"></span> PGDIT, JU<span class="dashboard_text">Student Dashboard</span></a></h1>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">

                <li class="treeview">
                    <a href="{{route('dash')}}">
                        <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Teachers</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('teachers.create')}}"><i class="fa fa-angle-right"></i> Add Teachers</a></li>
                        <li><a href="{{route('teachers.index')}}"><i class="fa fa-angle-right"></i> Manage Teachers </a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>