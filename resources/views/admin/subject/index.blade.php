@extends('admin.layouts.main')
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Host-Hands
                <!-- <a href="" class="btn btn-sm btn-primary float-right">Add</a> -->
            </h5>
        </div>
        <div class="card-body">

            <div class="table-responsive" style="overflow-x:hidden">
                <table class="table table-flush host-hand-section  align-items-center mb-0 data-table " id="myTable">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">SR. No.</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Profile Image</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Name</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Phone</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Email</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Status</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder">Action</th>
                        </tr>
                    </thead>
                    <tbody>

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
        $(function() {

            var table = $('.data-table').DataTable({

                language: {
                    paginate: {
                        next: '›',
                        previous: '‹'
                    }
                },

                processing: true,
                serverSide: true,
                ajax: "{{ route('getHostHandApprovalData') }}",
                columns: [{
                        data: 'srno',
                        name: 'srno'
                    },
                    {
                        data: 'profile_image',
                        name: 'profile_image'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'status1',
                        name: 'status1'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

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
