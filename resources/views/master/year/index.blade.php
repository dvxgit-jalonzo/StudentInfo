<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Years</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-year.create')}}">Create <Year></Year></a></li>
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
                            @foreach($years as $year)

                                <tr>
                                    <td>{{$year->name}}</td>
                                    <td>{{$year->created_at}}</td>

                                    <td>
                                        <a href="{{route('master-year.edit', [$year->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('master-year.destroy', [$year->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
