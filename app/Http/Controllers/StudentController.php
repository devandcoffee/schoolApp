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
        })->get();
        foreach ($students as $student) {
            $item = new \stdClass();
            $item->id = $student->id;
            $item->dni = $student->person->identity_id;
            $item->firstname = $student->person->firstname;
            $item->lastname = $student->person->lastname;
            $item->email = $student->person->email;
            $item->avatar = $student->person->avatar;
            $item->gender = $student->person->gender;
            $item->birthdate = $student->person->birthdate;
            $item->location = $student->person->location;
            $item->created_at = $student->created_at;
            $item->updated_at = $student->updated_at;

            array_push($data, $item);
        }
        return $data;
    }
}
