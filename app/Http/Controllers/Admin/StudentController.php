<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title      = 'student';
        $students   = Student::latest()->get();
        //dd($students);
        $data       = compact('title', 'students');
        return view('admin.students.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $title      = 'student';
        $student    = Student::find($id);
        $data       = compact('title', 'student');
        return view('admin.students.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = '')
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,'.$id,
            'phone' => 'required|numeric|unique:students,phone,'.$id.'|regex:/^([0-9\s\-\+\(\)]*)$/',
            'city' => 'required',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'status' => 'required|In:Active,Inactive',
        ]);

        if (isset($id) && $id != '') {
            $student = Student::find($id);
        } else {
            $student = new Student();
        }
        $student->fill($request->all());
        $student->save();

        return redirect()->route('admin.students.index')->with('success','record save success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title      = 'student';
        $data    = Student::with('subjects')->find($id);

        $data2       = compact('title', 'data');
        return view('admin.students.view', $data2);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
        }
        return redirect()->back()->with('success', 'Student Delete Successfully!');
    }


    public function changeStatus(Request $request)
    {
        $data = Student::find($request->id);
        $data->status = $request->status;
        $data->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function changeStatusTest(Request $request)
    {
        $data = Student::find($request->id);
        $data->status = $request->status;
        $data->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
