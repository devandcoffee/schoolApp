<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use App\Helpers\SelectBasedOn;
use App\Helpers\Datatable;
use App\Principal;
use App\Teacher;
use App\Person;
use App\User;
use Session;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Datatable::getDatatableConfig('principals');
        return view('admin.principals.index')->with('config', $config);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = SelectBasedOn::getConfig();
        return view('admin.principals.create', ['config' => $config]);
    }

    public function store(PersonRequest $request)
    {
        $data = $request->except(['role', 'city', 'country']);
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

        // TODO: generar passwords y mandar mail con los datos de la cuenta.
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt('admin'),
        ]);

        $role = $request->role;

        if ($role == 'principal')
        {
            $principal = Principal::create([
                'person_id' => $person->id,
                'user_id'   => $user->id,
            ]);
            Session::flash('success', __('messages.flash.principal_created'));
        }
        else if ($role == 'teacher')
        {
            $teacher = Teacher::create([
                'person_id' => $person->id,
                'user_id'   => $user->id,
            ]);
            Session::flash('success', __('messages.flash.teacher_created'));
        }

        return redirect()->route('principals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Principal $principal)
    {
        return view('admin.principals.show', ['principal' => $principal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Principal $principal)
    {
        $config = SelectBasedOn::getConfig();
        $config['field1']['value'] = $principal->person->country_id;
        $config['field2']['value'] = $principal->person->city_id;
        return view('admin.principals.edit', ['principal' => $principal, 'config' => $config]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, Principal $principal)
    {
        $data = $request->except(['city', 'country']);
        if($request->hasFile('avatar'))
        {
            $data['avatar'] = $request->avatar->store('public/avatars');
        }
        $data['city_id'] = $request->city ? $request->city : 26;
        $data['country_id'] = $request->country ? $request->country : 56;

        $principal->person()->update($data);
        Session::flash('success', __('messages.flash.principal_updated'));
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

    public function principals(Request $request)
    {
        $data = array();
        $principals = Principal::whereHas('person', function($query) use($request) {
            $query->filter($request->filter);
        })->paginate(10);

        foreach ($principals as $principal) {
            $principal->identity_id = $principal->person->identity_id;
            $principal->firstname = $principal->person->firstname;
            $principal->lastname = $principal->person->lastname;
            $principal->email = $principal->person->email;
            $principal->avatar = $principal->person->avatar;
            $principal->gender = $principal->person->gender;
            $principal->birthdate = $principal->person->birthdate->format('d-m-Y');
            $principal->address = $principal->person->address;
            $principal->country = $principal->person->country->name;
            $principal->city = $principal->person->city->name;
            $principal->mobile_phone = $principal->person->mobile_phone;
        }
        $principals->appends(['filter' => $request->filter]);
        return response()->json($principals);
    }

}
