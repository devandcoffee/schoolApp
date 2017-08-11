<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use App\Helpers\Datatable;
use App\Principal;
use App\Teacher;
use App\Person;
use App\User;

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
        return view('admin.principals.create');
    }

    public function store(PersonRequest $request)
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
        }
        else if ($role == 'principal')
        {
            $teacher = Teacher::create([
                'person_id' => $person->id,
                'user_id'   => $user->id,
            ]);
        }

        Session::flash('success', 'Principal created');
        return redirect()->route('principals.index');
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
    public function edit(Principal $principal)
    {
        return view('admin.principals.edit')->with('principal', $principal);
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
            $principal->location = $principal->person->location;
        }
        $principals->appends(['filter' => $request->filter]);
        return response()->json($principals);
    }

}
