<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Person;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPersonOverview()
    {
        $person = Auth::user()->person()->getResults();
        return view('person.overview' )->with('person', $person);
    }

    public function getPersonEditView($id)
    {
        $person = Person::find($id);
        $user = Auth::user();

        $this->authorize('update', [$user, $person]);

        return view('person.edit')->with('person', $person);
    }

    public function createIfNotExists(User $user)
    {
        if ($this->hasPerson($user)) {
            return;
        }
        $this->create($user);
    }

    //todo move to super class & make generic
    public function hasPerson(User $user)
    {

        return $user->person()->getResults() != null;
    }

    public function create(User $user)
    {
        $person = new Person();

        $person->name = $user->name;
        $person->user()->associate($user);

        $person->save();
    }

    public function update(Request $request) {
        $person = Auth::user()->person();
        $person->name = $request->name;
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
