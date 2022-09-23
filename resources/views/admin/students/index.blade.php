@extends('admin.layouts.main')
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Student
               <a href="{{ route('admin.students.create') }}" class="btn btn-sm btn-primary float-right">Add</a>
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="overflow-x:hidden">
                <table class="table table-flush host-hand-section  align-items-center mb-0 data-table " id="myTable">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">SR. No.</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Name</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Email</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Phone</th>

                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">City</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">State</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Country</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Status</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($students as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->phone }}</td>
                                <td>{{ $val->city }}</td>
                                <td>{{ $val->state }}</td>
                                <td>{{ $val->country }}</td>
                                <td><label class="status-switch">

                                    <input type="checkbox" class="changestatus" data-id="{{ $val->id}}" data-on="Active" data-off="InActive"  <?php if($val->status == "Active" ){ echo 'checked';} ?>>
                                    <span class="status-slider round"></span></td>

                                <td> <a href="{{ route('admin.students.show', $val->id) }}"><i class="fa fa-eye"></i> </a>
                                    <a href=" {{ route('admin.students.create', $val->id) }} " class="fa fa-edit"
                                        title="Edit"></a>
                                    <a href="{{ route("admin.students.delete", $val->id) }}"
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

        $(document).ready( function () {
            $('#myTable').DataTable();
        });

        $(function() {
            $('#myTable').on('change', 'tbody input.changestatus', function() {
                var status = $(this).prop('checked') == true ? "Active" : "Inactive";
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route("admin.students.change_status") }}',
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
