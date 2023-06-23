<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Courses</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-course.create')}}">Create Course</a></li>
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
                                <td>CreatedAt</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)

                                <tr>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->created_at}}</td>

                                    <td>
                                        <a href="{{route('master-course.edit', [$course->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('master-course.destroy', [$course->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
                                    columns: [0,1]
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: [0,1]
                                }
                            }
                        ]
                    });
                });
            </script>

    @endsection
</x-master>
