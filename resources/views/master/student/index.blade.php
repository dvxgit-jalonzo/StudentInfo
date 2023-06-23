<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Users</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-user.create')}}">Create User</a></li>
                </ol>
            </nav>
        </div>
    @endsection



    @section('content')
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card card-body pt-3 table-responsive" >
                        <table class="table table-sm" id="table">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Username</td>
                                <td>Role</td>
                                <td>Gender</td>
                                <td>Address</td>
                                <td>Course</td>
                                <td>Year</td>
                                <td>CreatedAt</td>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->getRoleNames()->first()}}</td>
                                    <td>{{$user->userDetail->gender}}</td>
                                    <td>{{$user->userDetail->address}}</td>
                                    <td>{{$user->userDetail->course}}</td>
                                    <td>{{$user->userDetail->year}}</td>
                                    <td>{{$user->created_at}}</td>
                                  </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endsection


    @section('script')
            <script>
                $(document).ready(function(){
                    $("#table").DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,7,8]
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,7,8]
                                }
                            }
                        ]
                    });
                });
            </script>

    @endsection
</x-master>
