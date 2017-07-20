<?php

namespace App\Http\Controllers;

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
        //
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
        //
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
