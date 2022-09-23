@extends('admin.layouts.main')
@section('content')
@include('admin.inc.validation_message')
@include('admin.inc.auth_message')
    <div class="card mt-4" id="basic-info">
        <div class="card-header">
            <h5>Student
                <a href="{{ route('admin.students.index') }}" class="btn btn-sm btn-primary float-right">List</a>
            </h5>
        </div>

        <div class="card-body pt-0">

            @if (isset($student->id))
                @php
                    $id = $student->id;
                    $name = $student->name;
                    $email = $student->email;
                    $phone = $student->phone;
                    $address = $student->address;
                    $city = $student->city;
                    $state = $student->state;
                    $country = $student->country;
                    $status = $student->status;

                @endphp
            @else
                @php
                    $id = '';
                    $name = '';
                    $email = '';
                    $phone = '';
                    $address = '';
                    $city = '';
                    $state = '';
                    $country = '';
                    $status = '';

                @endphp
            @endif
            <form method="post" action="{{ route('admin.students.store', $id) }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <label class="form-label"> Name</label>
                        <div class="input-group">
                            <input id="name" name="name" value="{{ $name }}" class="form-control"
                                type="text" placeholder="Enter Name" required="required">
                        </div>
                    </div>


                    <div class="col-6">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <input id="email" name="email" value="{{ $email }}" class="form-control"
                                type="email" placeholder="Enter Email">
                        </div>
                    </div>

                    <div class="col-6">
                        <label class="form-label mt-4">Phone Number</label>
                        <div class="input-group">
                            <input name="phone" value="{{ $phone }}" class="form-control"
                                oninput="digitValidate(this)" type="text" maxlength="10"
                                placeholder="Enter Phone Number">
                        </div>
                    </div>

                    <div class="col-6">
                        <label class="form-label ">Address</label>
                        <div class="input-group">
                            <input name="address" value="{{ $address }}" class="form-control" type="text"
                                placeholder="Enter Address">
                        </div>
                    </div>

                    <div class="col-6">
                        <label class="form-label">City</label>
                        <div class="input-group">
                            <input name="city" id="city" value="{{ $city }}" class="form-control"
                                type="text" placeholder="please enter City">
                        </div>
                        <p class="" id="passwordMatchmessage"></p>
                    </div>


                    <div class="col-6">
                        <label class="form-label">State</label>
                        <div class="input-group">
                            <input type="text" id="state" name="state" value="{{ $state }}"
                                class="form-control" placeholder="Enter State">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label mt-4">Country</label>
                        <div class="input-group">
                            <input id="country" name="country" value="{{ $country }}" class="form-control"
                                type="text" placeholder="Enter Country">
                        </div>
                    </div>

                    <div class="col-6">
                        <label class="form-label mt-4">Status</label>
                        <div class="input-group">
                            <select name="status" class="form-control" id="" required="required">
                                <option value="Active" <?php if ($status == 'Active') {
                                    echo 'selected';
                                } ?>>Active</option>
                                <option value="Inactive" <?php if ($status == 'Inactive') {
                                    echo 'selected';
                                } ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-dark btn-sm ms-auto mb-0 js-btn-next" type="submit"
                        title="Update">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection
