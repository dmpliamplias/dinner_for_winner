<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Person;
use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
        ]);
    }

    public function index()
    {
        $person = Auth::user()->person()->getResults();
        return view('person.index' )->with('person', $person);
    }


    public function createIfNotExists(User $user)
    {
        if ($this->hasPerson($user)) {
            return;
        }
        $this->createInternal($user);
    }

    public function hasPerson(User $user)
    {
        return $user->person()->getResults() != null;
    }

    public function create()
    {
        return view('person.create');
    }


    public function update(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->authorize('update-person', Auth::user()->person()->getResults());

        $person = Auth::user()->person();

        $person->name = $request->name;
    }

    public function delete()
    {
        $person = Auth::user()->person();

        $person->delete();
    }

    private function createInternal(User $user)
    {
        $person = new Person();

        $person->name = $user->name;
        $person->user()->associate($user);

        $person->save();
    }

}
