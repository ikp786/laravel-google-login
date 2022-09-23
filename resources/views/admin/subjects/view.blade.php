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
      <h5>Host-Hands Details
         <a href="{{route('host-hand')}}" class="btn btn-sm btn-primary float-right">List</a>
      </h5>
   </div>
   <div class="card-body pt-0">
        <div class="container pb-lg-9 pb-10  ">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-7 mx-auto text-center">
                    <div class="nav-wrapper position-relative z-index-2">
                        <ul class="nav nav-pills nav-fill flex-row p-1" id="tabs-pricing" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 active" id="tabs-iconpricing-tab-1" data-bs-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="true">
                                Host-Hand Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0" id="tabs-iconpricing-tab-2" data-bs-toggle="tab" href="#annual" role="tab" aria-controls="annual" aria-selected="false">
                                {{-- Events --}}
                                </a>
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
                                    {{$data->name ?? 'N/A'}}
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label mt-4">Email</label>
                                <div class="input-group">
                                    {{$data->email ?? 'N/A'}}
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label mt-4">Phone Number</label>
                                <div class="input-group">
                                    ({{$data->country_code}}){{$data->phone}}
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label mt-4">Profile Image</label>
                                <br>    
                                @if($data->profile_image != NULL)
                                    <img alt="Profile Image" class="avatar avatar-sm me-3" src="{{asset($data->profile_image)}}">
                                @else
                                    <span class="text-red">Not Uploaded!</span>
                                @endif
                            </div>
                            <div class="col-4">
                                <label class="form-label mt-4">Bio</label>
                                <div class="input-group">
                                    {{$data->bio ?? 'N/A'}}
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label mt-4">Date of Birth</label>
                                <div class="input-group">
                                    {{date("d-m-Y",strtotime($data->dob)) ?? 'N/A'}}
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label mt-4">Zip Code</label>
                                <div class="input-group">
                                    {{$data->zip_code ?? 'N/A'}}
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label mt-4">Address</label>
                                <div class="input-group">
                                    {{$data->address ?? 'N/A'}}
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label mt-4">Status</label>
                                <div class="input-group">
                                    <?php if($data->status == '1'){echo "Active";} ?>
                                    <?php if($data->status == '0'){echo "Inactive";} ?>
                                </div>
                            </div>
                            <hr class="mt-4 mb-4">
                            <div class="col-6">
                                <label class="form-label ">Bank Name</label>
                                <div class="input-group">
                                    {{$data->bank_name ?? 'N/A'}}
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label ">Bank Customer Name</label>
                                <div class="input-group">
                                    {{$data->bank_customer_name ?? 'N/A'}}
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">Bank Account Number</label>
                                <div class="input-group">
                                    {{$data->bank_acc_no ?? 'N/A'}}
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">Bank IFSC Code</label>
                                <div class="input-group">
                                    {{$data->bank_ifsc ?? 'N/A'}}
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