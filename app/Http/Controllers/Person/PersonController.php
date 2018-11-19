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
    public function index()
    {
        $person = Auth::user()->person()->getResults();
        return view('person.index' )->with('person', $person);
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
        $this->createInternal($user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function hasPerson(User $user)
    {
        return $user->person()->getResults() != null;
    }

    public function create()
    {
        return view('person.create');
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $person = new Person();
        $person->name = $request->input('name');
        $person->save();

        return redirect('/person/overview')->with('success', 'Familienmitglied hinzugefügt');
    }

    /**
     * Delete the person entry.
     */
    public function delete()
    {
        $person = Auth::user()->person();
        $person->delete();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param User $user
     */
    private function createInternal(User $user)
    {
        $person = new Person();

        $person->name = $user->name;
        $person->user()->associate($user);

        $person->save();
    }

}
