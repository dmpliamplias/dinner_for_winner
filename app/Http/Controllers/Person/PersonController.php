<?php

namespace App\Http\Controllers\Person;

use App\Person;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPersonOverview() {
        $person = $this->retrievePerson();
        return view('person.overview' )->with('person', $person);
    }

    public function retrievePerson() {
        $user = Auth::user();
        $person = $user->person();
        if ($person != null) {
            return $person;
        }
        return $this->create();
    }

    public function create()
    {
        $person = new Person();

        $person->name=Auth::user()->name;

        $person->save();
    }

    public function update(Request $request) {
        $person = Auth::user()->person();
        $person->name = $request->name;

        $person->save();
    }

    public function show($id)
    {
        $person = Person::find($id);
        return view('person.show', array('person' => $person));
    }

    public function delete()
    {
        $person = Auth::user()->person();
        $person->delete();
    }

}
