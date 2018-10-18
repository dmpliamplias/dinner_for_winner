<?php

namespace App\Http\Controllers\Person;

use App\Person;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPersonOverview() {
        $person = Auth::user()->person()->getResults();
        return view('person.overview' )->with('person', $person);
    }

    public function createIfNotExists(User $user)

    {
        if ($this->hasPerson($user)) {
            return;
        }
        $this->create($user);
    }

    public function hasPerson(User $user)
    {

        $personResult = $user->person()->getResults();
        return $personResult->exists;
    }

    public function create(User $user)
    {
        $person = new Person();

        $person->name = $user->name;

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
