<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('master.index')}}" class="logo d-flex align-items-center">

            <span class="d-none d-lg-block">{{acro(config('app.name'))}}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

                    @if(auth()->user()->profile)
                        <img width="40" height="40" src="{{asset('storage/profile')."/".auth()->user()->profile->picture}}" alt="Profile" class="rounded-circle">
                    @else
                        <img src="{{asset('NiceAdmin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                    @endif
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{displayName(auth()->user()->name)}}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{auth()->user()->name}}</h6>
                        <span>{{getRole()}}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('profile.index')}}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

{{--                    <li>--}}
{{--                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">--}}
{{--                            <i class="bi bi-gear"></i>--}}
{{--                            <span>Account Settings</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
