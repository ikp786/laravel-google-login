@extends('admin.layouts.main')
@section('content')
@include('admin.inc.validation_message')
@include('admin.inc.auth_message')
    <div class="card mt-4" id="basic-info">
        <div class="card-header">
            <h5>subject
                <a href="{{ route('admin.subjects.index') }}" class="btn btn-sm btn-primary float-right">List</a>
            </h5>
        </div>

        <div class="card-body pt-0">

            @if (isset($subject->id))
                @php
                    $id = $subject->id;
                    $student_id = $subject->student_id;
                    $name = $subject->name;
                    $marks = $subject->marks;
                    $grade = $subject->grade

                @endphp
            @else
                @php
                $id = '';
                $student_id = '';
                $name ='';
                $marks = '';
                $grade = ''

                @endphp
            @endif
            <form method="post" action="{{ route('admin.subjects.store', $id) }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <label class="form-label"> Student</label>
                        <div class="input-group">
                           <select class="form-control" name="student_id" id="student_id">
                            <option value="">Select student</option>
@foreach($students as $key => $value)


                            <option value="{{ $key }}">{{ $value }}</option>

                            @endforeach

                           </select>
                        </div>
                    </div>


                    <div class="col-6">
                        <label class="form-label"> Name</label>
                        <div class="input-group">
                            <input id="name" name="name" value="{{ $name }}" class="form-control"
                                type="text" placeholder="Enter Name" required="required">
                        </div>
                    </div>



                    <div class="col-6">
                        <label class="form-label">marks</label>
                        <div class="input-group">
                            <input id="marks" name="marks" value="{{ $marks }}" class="form-control"
                            oninput="digitValidate(this)" type="text" maxlength="5" placeholder="Enter marks">
                        </div>
                    </div>

                    <div class="col-6">
                        <label class="form-label mt-4">grade </label>
                        <div class="input-group">
                            <input name="grade" value="{{ $grade }}" class="form-control"

                                placeholder="Enter grade ">
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
