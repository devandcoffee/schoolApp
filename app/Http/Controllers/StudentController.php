<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Student;
use App\Person;

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
            'identity_id' => __('messages.persons.identity_id'),
            'firstname'   => __('messages.persons.firstname'),
            'lastname'    => __('messages.persons.lastname'),
            'email'       => __('messages.persons.email'),
            'gender'      => __('messages.persons.gender'),
            'birthdate'   => __('messages.persons.birthdate'),
            'location'    => __('messages.persons.location'),
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
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $person = new Person;
        $person->identity_id = $request->identity_id;
        $person->firstname = $request->firstname;
        $person->lastname = $request->lastname;
        $person->email = $request->email;
        $person->gender = $request->gender;
        $person->birthdate = $request->birthdate;
        $person->location = $request->location;

        if($request->hasFile('avatar'))
        {
            $person->avatar = $request->avatar->store('public/avatars');
        }

        $person->save();

        $student = Student::create([
            'person_id' => $person->id,
        ]);

        Session::flash('success', 'Student created');
        return redirect()->route('students');
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
    public function edit(Student $student)
    {
        return view('admin.students.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student, UpdateStudentRequest $request)
    {
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
    public function destroy(Student $student, Request $request)
    {
        $person = $student->person();

        $student->delete();
        $person->delete();

        return $this->students($request);
    }

    public function students(Request $request)
    {
        $data = array();
        $students = Student::whereHas('person', function($query) use($request) {
            $query->filter($request->filter);
        })->paginate(10);

        foreach ($students as $student) {
            $student->identity_id = $student->person->identity_id;
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
