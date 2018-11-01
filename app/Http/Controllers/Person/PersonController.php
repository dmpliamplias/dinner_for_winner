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

    /**
     * PersonController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming person mutation request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPersonOverview()
    {
        $person = Auth::user()->person()->getResults();
        return view('person.overview' )->with('person', $person);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function getPersonEditView($id)
    {
        $person = Person::find($id);

        $this->authorize('update-person', $person);

        return view('person.edit')->with('person', $person);
    }

    /**
     * @param User $user
     */
    public function createIfNotExists(User $user)
    {
        if ($this->hasPerson($user)) {
            return;
        }
        $this->create($user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function hasPerson(User $user)
    {
        return $user->person()->getResults() != null;
    }

    /**
     * @param User $user
     */
    public function create(User $user)
    {
        $person = new Person();

        $person->name = $user->name;
        $person->user()->associate($user);

        $person->save();
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        $this->validator($request->all())->validate();



        $person = Auth::user()->person();
        $person->name = $request->name;
    }

    public function add(Request $request)
    {

    }

    /**
     * Delete the person entry.
     */
    public function delete()
    {
        $person = Auth::user()->person();
        $person->delete();
    }

}
