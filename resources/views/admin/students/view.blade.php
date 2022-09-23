@extends('admin.layouts.main')
@section('style')
    <style>
        .nav.nav-pills .nav-link.active {
            background: #ff5c39;
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="card mt-4" id="basic-info">
        <div class="card-header">
            <h5>Student Details
                <a href="{{ route('admin.students.index') }}" class="btn btn-sm btn-primary float-right">List</a>
            </h5>
        </div>
        <div class="card-body pt-0">
            <div class="container pb-lg-9 pb-10  ">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-7 mx-auto text-center">
                        <div class="nav-wrapper position-relative z-index-2">
                            <ul class="nav nav-pills nav-fill flex-row p-1" id="tabs-pricing" role="tablist">

                                <li class="nav-item">

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-n8">
                <div class="container">
                    <div class="tab-content tab-space">
                        <div class="tab-pane active" id="monthly">
                            <div class="row fiterDiv">
                                <div class="col-lg-12 mb-lg-0 mb-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <label class="form-label mt-4">Name</label>
                                            <div class="input-group">
                                                {{ $data->name ?? 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label mt-4">Email</label>
                                            <div class="input-group">
                                                {{ $data->email ?? 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label mt-4">Phone</label>
                                            <div class="input-group">
                                                {{ $data->phone }}
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <label class="form-label mt-4">city</label>
                                            <div class="input-group">
                                                {{ $data->city ?? 'N/A' }}
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label class="form-label mt-4">State</label>
                                            <div class="input-group">
                                                {{ $data->state ?? 'N/A' }}
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label class="form-label mt-4">Country</label>
                                            <div class="input-group">
                                                {{ $data->country ?? 'N/A' }}
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <label class="form-label mt-4">Status</label>
                                            <div class="input-group">
                                                <?php if ($data->status == 'Active') {
                                                    echo 'Active';
                                                } ?>
                                                <?php if ($data->status == 'Inactive') {
                                                    echo 'Inactive';
                                                } ?>
                                            </div>
                                        </div>
                                        <hr class="mt-4 mb-4">
                                        <div class="col-6">
                                            <label class="form-label ">Subject</label>
                                            <div class="input-group">
                                                @foreach ($data->subjects as $value)
                                                    {{ $value->name }},
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="annual">
                            <div class="row">
                                <div class="col-lg-12 mb-lg-0 mb-4">
                                    <p>test1 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
