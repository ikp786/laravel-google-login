<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title      = 'Subject';
        $subjects    = Subject::get();
        $student    = Student::pluck('id', 'name');
        $data       = compact('student', 'title', 'subjects');

        return view('admin.subjects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title      = 'Subject';
        $subject    = Subject::get();
        $students   = Student::pluck('name', 'id');
        $data       = compact('subject', 'title', 'students');

        return view('admin.subjects.create', $data);
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
            'student_id' => 'required|numeric',
            'name' => 'required',
            'marks' => 'required|numeric',
            'grade' => 'required'
        ]);

        if (isset($id) && $id != '') {
            $subject = Subject::find($id);
        } else {
            $subject = new Subject();
        }
        $subject->fill($request->all());
        $subject->save();

        return redirect()->route('admin.subjects.index')->with('success','record save success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function edit(Subjects $subjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subjects $subjects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Subject::find($id);
        $data->delete();

        return redirect()->back()->with('success','record delete success');

    }
}
