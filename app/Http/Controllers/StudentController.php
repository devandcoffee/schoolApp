<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\StudentRequest;
use App\Helpers\Datatable;
use App\Helpers\SelectBasedOn;
use App\Student;
use App\Person;
use App\City;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Datatable::getDatatableConfig();
        return view('admin.students.index')->with('config', $config);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = SelectBasedOn::getConfig();
        return view('admin.students.create')->with('config', $config);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        /*
        $person = new Person;
        $person->identity_id = $request->identity_id;
        $person->firstname = $request->firstname;
        $person->lastname = $request->lastname;
        $person->email = $request->email;
        $person->gender = $request->gender;
        $person->birthdate = $request->birthdate;
        $person->country_id = $request->country;
        $person->city_id = $request->city ? $request->city : 26;
        $person->address = $request->address;
        $person->mobile_phone = $request->mobile_phone;
        $person->home_phone = $request->home_phone;

        if($request->hasFile('avatar'))
        {
            $person->avatar = $request->avatar->store('public/avatars');
        }

        $person->save();

        $student = Student::create([
            'person_id' => $person->id,
            'docket_number' => $request->docket_number,
        ]);

        Session::flash('success', 'Student created');*/
        return redirect()->route('tutors.create', ['student' => 23]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('admin.students.show')->with('student', $student);
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
    public function update(Student $student, PersonRequest $request)
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
            $student->birthdate = $student->person->birthdate->format('d-m-Y');
            $student->address = $student->person->address;
            $student->country = $student->person->country->name;
            $student->city = $student->person->city->name;
            $student->mobile_phone = $student->person->mobile_phone;
        }
        $students->appends(['filter' => $request->filter]);
        return response()->json($students);
    }

    public function city(Request $request)
    {
        $cities = City::where('country_id', $request->field1)->orderBy('name')->get();
        return response()->json($cities);
    }
}
