@extends('admin.layouts.main')
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Student
                <a href="{{ route('admin.subjects.create') }}" class="btn btn-sm btn-primary float-right">Add</a>
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="overflow-x:hidden">
                <table class="table table-flush host-hand-section  align-items-center mb-0 data-table " id="myTable">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">SR. No.</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Student </th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Name</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">marks</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Grade</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->marks }}</td>
                                <td>{{ $val->grade }}</td>
                                <td>
                                    <a href=" {{ route('admin.subjects.create', $val->id) }} " class="fa fa-edit"
                                        title="Edit"></a>
                                    <a href="{{ route('admin.subjects.delete', $val->id) }}"
                                        onclick="return confirm('Are you sure you want to delete this?');"
                                        class="fa fa-trash" title="Delete"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });


        $(function() {
            $('#myTable').on('change', 'tbody input.changestatus', function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ url('/admin/changeHostStatus') }}',
                    data: {
                        'status': status,
                        'id': id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
@endsection
