<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>My Personal Information</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                </ol>
            </nav>
        </div>
    @endsection



    @section('content')
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-body pt-3">
                            <form action="{{route('master-user-info.update', [$user->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <x-form-floating name="name" type="text" placeholder="Name" value="{{$user->name}}">
                                                    <x-validation name="name"></x-validation>
                                                </x-form-floating>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <x-form-floating name="username" type="text" placeholder="Username" value="{{$user->username}}">
                                                    <x-validation name="username"></x-validation>
                                                </x-form-floating>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <x-form-floating name="email" type="text" placeholder="Email" value="{{$user->email}}">
                                                    <x-validation name="email"></x-validation>
                                                </x-form-floating>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <select name="gender" class="form-control form-select">
                                                    <option disabled selected>Gender</option>
                                                    <option @if($user->userDetail) @if($user->userDetail->gender == "Male") selected @endif @endif value="Male">Male</option>
                                                    <option @if($user->userDetail) @if($user->userDetail->gender == "Female") selected @endif @endif value="Female">Female</option>
                                                </select>
                                                <x-validation name="gender"></x-validation>
                                            </div>
                                            <input type="hidden" value="">
                                            <div class="col-12 mb-3">
                                                <x-form-floating name="address" type="text" placeholder="Address" value="{{ $user->userDetail ? $user->userDetail->address : '' }}">
                                                    <x-validation name="address"></x-validation>
                                                </x-form-floating>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <select name="course" class="form-control form-select">
                                                    <option disabled selected>Course</option>
                                                    @foreach($courses as $course)
                                                        <option @if($user->userDetail) @if($user->userDetail->course == $course->name) selected @endif @endif value="{{$course->name}}">{{$course->name}}</option>
                                                    @endforeach
                                                </select>
                                                <x-validation name="course"></x-validation>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <select name="year" class="form-control form-select">
                                                    <option disabled selected>Year</option>
                                                    @foreach($years as $year)
                                                        <option @if($user->userDetail) @if($user->userDetail->year == $year->name) selected @endif @endif value="{{$year->name}}">{{$year->name}}</option>
                                                    @endforeach
                                                </select>
                                                <x-validation name="year"></x-validation>
                                            </div>

                                            <div class="col-12 mb-3 ">
                                                <div class="float-end">
                                                    <button class="btn btn-outline-primary">Create or Update User Detail</button>
                                                    <button type="reset" class="btn btn-outline-dark">Reset</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

    @section('script')

    @endsection
</x-master>
