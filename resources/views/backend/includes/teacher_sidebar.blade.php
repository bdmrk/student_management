<aside class="sidebar-left">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="{{route('teacher-dash')}}"><span class="fas fa-chalkboard"></span> PGDIT, JU<span class="dashboard_text">Teacher Dashboard</span></a></h1>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">

                <li class="treeview">
                    <a href="{{route('student-dash')}}">
                        <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="{{route('show-courses')}}">
                        <i class="fas fa-tachometer-alt"></i> <span>Show All Course</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="{{route('marks-entry')}}">
                        <i class="fas fa-tachometer-alt"></i> <span>Marks Entry</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>