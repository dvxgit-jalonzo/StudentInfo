<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('master.index')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>



        @role('Administrator')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('master-user.index')}}">
                            <i class="bi bi-circle"></i><span>View User</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#students-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="students-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('master-student.index')}}">
                            <i class="bi bi-circle"></i><span>View Students</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#courses-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Courses</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="courses-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('master-course.index')}}">
                            <i class="bi bi-circle"></i><span>View Courses</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#years-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Years</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="years-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('master-year.index')}}">
                        <i class="bi bi-circle"></i><span>View Years</span>
                    </a>
                </li>

            </ul>
        </li>
        @endrole

        @role('Student')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('master-user-info.show', [auth()->user()->id])}}">
                <i class="bi bi-question-circle"></i>
                <span>Information</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->
        @endrole


    </ul>

</aside><!-- End Sidebar-->
