<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = [
            'dni',
            'firstname',
            'lastname',
            'email',
            'gender',
            'birthdate',
            'location'
        ];
        return view('admin.students.index')->with('columns', $columns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('admin.students.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'identity_id' => 'required|numeric',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'avatar' => 'image',
            'gender' => 'required',
            'birthdate' => 'required|date',
            'location' => 'required',
        ]);

        $student = Student::find($id);
        $student->person()->update([
            'identity_id' => $request->identity_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'location' => $request->location,
        ]);

        if($request->hasFile('avatar'))
        {
            $student->person()->update([
                'avatar' => $request->avatar->store('public/avatars'),
            ]);
        }

        Session::flash('success', 'Student updated');
        return redirect()->route('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function students(Request $request)
    {
        $data = array();
        $students = Student::whereHas('person', function($query) use($request) {
            $query->filter($request->filter);
        })->paginate(10);

        foreach ($students as $student) {
            $student->dni = $student->person->identity_id;
            $student->firstname = $student->person->firstname;
            $student->lastname = $student->person->lastname;
            $student->email = $student->person->email;
            $student->avatar = $student->person->avatar;
            $student->gender = $student->person->gender;
            $student->birthdate = $student->person->birthdate;
            $student->location = $student->person->location;
        }
        $students->appends(['filter' => $request->filter]);
        return response()->json($students);
    }
}
