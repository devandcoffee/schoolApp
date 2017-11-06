<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\StudentRequest;
use App\Helpers\Datatable;
use App\Helpers\SelectBasedOn;
use App\Student;
use App\Person;
use App\City;
use Session;

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
        $data = $request->except(['docket_number', 'city', 'country']);
        if($request->hasFile('avatar'))
        {
            $data['avatar'] = $request->avatar->store('public/avatars');
        }
        else {
            $data['avatar'] = $data['gender'] == 'male' ? 'public/defaults/avatars/male.png' : 'public/defaults/avatars/female.png';
        }
        $data['city_id'] = $request->city ? $request->city : 26;
        $data['country_id'] = $request->country ? $request->country : 56;
        $person = Person::create($data);

        $student = Student::create([
            'person_id' => $person->id,
            'docket_number' => $request->docket_number,
        ]);

        Session::flash('success', __('messages.flash.student_created'));
        return redirect()->route('tutors.create', $student->id);
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
        $config = SelectBasedOn::getConfig();
        $config['field1']['value'] = $student->person->country_id;
        $config['field2']['value'] = $student->person->city_id;
        return view('admin.students.edit', ['student' => $student, 'config' => $config]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student, StudentRequest $request)
    {
        $data = $request->except(['docket_number', 'city', 'country']);
        $data['city_id'] = $request->city ? $request->city : 26;
        $data['country_id'] = $request->country ? $request->country : 56;

        if($request->hasFile('avatar'))
        {
            $data['avatar'] = $request->avatar->store('public/avatars');
        }

        $student->person()->update($data);

        $data = $request->only(['docket_number']);
        $student->update($data);

        Session::flash('success', __('messages.flash.student_updated'));
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

    public function autocomplete(Request $request)
    {
        $students = Student::whereHas('person', function($query) use($request) {
            $query->filter($request->filter);
        })->get();
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

        return response()->json($students);
    }
}
