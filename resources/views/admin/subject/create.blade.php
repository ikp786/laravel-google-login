@extends('admin.layouts.main')
@section('content')

<div class="card mt-4" id="basic-info">
   <div class="card-header">
      <h5>Host-Hands Info
          <a href="{{route('admin.subjects.index')}}" class="btn btn-sm btn-primary float-right">List</a>
      </h5>
   </div>
   <div class="card-body pt-0">
        <form method="post" action="{{route('admin.subjects.index')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="row">
                <div class="col-4">
                    <label class="form-label mt-4">First Name</label>
                    <div class="input-group">
                        <input id="first_name" name="first_name" value="{{$data->first_name}}" class="form-control" type="text" placeholder="Enter First Name" required="required">
                    </div>
                </div>
                <div class="col-4">
                    <label class="form-label mt-4">Middle Name</label>
                    <div class="input-group">
                        <input id="middle_name" name="middle_name" value="{{$data->middle_name}}" class="form-control" type="text" placeholder="Enter Middle Name" >
                    </div>
                </div>
                <div class="col-4">
                    <label class="form-label mt-4">Last Name</label>
                    <div class="input-group">
                        <input id="last_name" name="last_name" value="{{$data->last_name}}" class="form-control" type="text" placeholder="Enter Last Name" required="required">
                    </div>
                </div>

                <div class="col-6">
                    <label class="form-label mt-4">Email</label>
                    <div class="input-group">
                        <input id="email" name="email" value="{{$data->email}}" class="form-control" type="email" placeholder="Enter Email" readonly>
                    </div>
                </div>
                <div class="col-2">
                    <label class="form-label mt-4">Country Code</label>
                    <div class="input-group">
                    <input name="country_code" value="{{$data->country_code}}" class="form-control" type="text" placeholder="Country Code" readonly>
                    </div>
                </div>
                <div class="col-4">
                    <label class="form-label mt-4">Phone Number</label>
                    <div class="input-group">
                    <input name="phone" value="{{$data->phone}}" class="form-control" oninput="digitValidate(this)" type="text" maxlength="10" placeholder="Enter Phone Number" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">Password</label>
                    <div class="input-group">
                        <input id="password" name="password" value="{{old('password')}}" class="form-control" type="password" placeholder="Enter Password">
                    </div>
                </div>


                <div class="col-6">
                    <label class="form-label mt-4">Confirm Password</label>
                    <div class="input-group">
                    <input name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" type="password" placeholder="Re-enter Password">
                    </div>
                    <p class="" id="passwordMatchmessage"></p>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">Profile Image</label>
                    <div class="input-group">
                        <input type="file" id="profile_image" name="profile_image" class="form-control" accept="image/*">
                    </div>
                    <br>
                    @if($data->profile_image != NULL)
                        <img alt="Profile Image" class="avatar avatar-sm me-3" src="{{asset($data->profile_image)}}">
                    @else
                        <span class="text-red">Not Uploaded!</span>
                    @endif
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">Bio</label>
                    <div class="input-group">
                        <textarea rows="5" cols="5" class="form-control" name="bio" placeholder="Enter Bio" value="{{$data->bio}}">{{$data->bio}}</textarea>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">Date of Birth</label>
                    <div class="input-group">
                        <input type="date" id="dob" name="dob" value="{{$data->dob}}" class="form-control" placeholder="Enter Date of Birth">
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">Zip Code</label>
                    <div class="input-group">
                        <input id="zip_code" name="zip_code" value="{{$data->zip_code}}" class="form-control" type="text" placeholder="Enter Zip Code">
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">Address</label>
                    <div class="input-group">
                        <textarea rows="5" cols="5" class="form-control" name="address" placeholder="Enter Address" value="{{$data->address}}">{{$data->address}}</textarea>
                    </div>
                </div>

                <div class="col-6">
                    <label class="form-label mt-4">Status</label>
                    <div class="input-group">
                        <select name="status" class="form-control" id="" required="required">
                            <option value="1" <?php if($data->status == '1'){echo "selected";} ?>>Active</option>
                            <option value="0" <?php if($data->status == '0'){echo "selected";} ?>>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <label class="form-label mt-4">Bank Name</label>
                    <div class="input-group">
                        <input id="bank_name" name="bank_name" value="{{$data->bank_name}}" class="form-control" type="text" placeholder="Bank Name">
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">Bank Customer Name</label>
                    <div class="input-group">
                        <input id="bank_customer_name" name="bank_customer_name" value="{{$data->bank_customer_name}}" class="form-control" type="text" placeholder="Bank Customer Name">
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">Bank Account Number</label>
                    <div class="input-group">
                        <input id="bank_acc_no" name="bank_acc_no" value="{{$data->bank_acc_no}}" class="form-control" type="text" placeholder="Bank Account Number">
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">Bank IFSC Code</label>
                    <div class="input-group">
                        <input id="bank_ifsc" name="bank_ifsc" value="{{$data->bank_ifsc}}" class="form-control" type="text" placeholder="Bank IFSC Code">
                    </div>
                </div>
            </div>
            <div class="button-row d-flex mt-4">
                <button class="btn bg-gradient-dark btn-sm ms-auto mb-0 js-btn-next" type="submit" title="Update">Update</button>
            </div>
        </form>
   </div>
</div>

@endsection
@section('script')
@endsection
