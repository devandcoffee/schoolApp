<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SelectBasedOn;
use App\Http\Requests\TutorRequest;
use App\Person;
use App\Student;
use App\Tutor;
use Session;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
    {
        $config = SelectBasedOn::getConfig();
        if ($student->num_tutors == 0) {
            $tutor = 1;
        }
        elseif ($student->num_tutors == 1) {
            $tutor = 2;
        }
        else {
            return redirect()->route('students');
        }

        return view('admin.tutors.create', [
            'config' => $config,
            'tutor' => $tutor,
            'student' => $student->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TutorRequest $request)
    {
        $student = Student::find($request->id);

        $num_tutor = 0;
        if ($student->num_tutors == 0) {
            $num_tutor = 1;
        }
        elseif ($student->num_tutors == 1) {
            $num_tutor = 2;
        }

        if ($num_tutor != 0) {
            $data = $request->except(['id', 'job', 'job_phone', 'city', 'country']);
            $data['city_id'] = $request->city ? $request->city : 26;
            $data['country_id'] = $request->country ? $request->country : 56;
            if($request->hasFile('avatar'))
            {
                $data['avatar'] = $request->avatar->store('public/avatars');
            }
            else {
                $data['avatar'] = $data['gender'] == 'male' ? 'public/defaults/avatars/male.png' : 'public/defaults/avatars/female.png';
            }
            $person = Person::create($data);

            $data = $request->only(['job', 'job_phone']);
            $data['person_id'] = $person->id;
            $tutor = Tutor::create($data);

            $student->update([
                "tutor{$num_tutor}_id" => $tutor->id,
            ]);

            Session::flash('success', __('messages.flash.tutor_created', ['num' => $num_tutor]));
        }

        if ($num_tutor == 1) {
            return redirect()->route('tutors.create', ['student' => $student->id]);
        }
        else {
            return redirect()->route('students');
        }
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
}
