<?php

namespace App\Http\Controllers\FamilyMember;

use App\FamilyMember;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Person;


class FamilyMemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $person = Auth::user()->person()->getResults();
        $families = $person->familyMembers()->getResults();

        if (!$this->hasPersonFamilyMemberEntry($person)) {
            $this->createForPerson($person);
        }

        return view('family.index')->with('families', $families);
    }

    public function show($id)
    {
        $familyMember = FamilyMember::find($id);

        return view('family.show')->with('member', $familyMember);
    }

    public function update(Request $request, $id)
    {
        $familyMember = FamilyMember::find($id);

        $familyMember->name = $request->input('name');
        $familyMember->gender = $request->input('gender');
        $familyMember->goal = $request->input('goal');
        $familyMember->eat = $request->input('eat');

        $familyMember->save();

        return redirect('/familyMember')->with('success', 'Familienmitglied bearbeitet');
    }

    public function create()
    {
        return view('family.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|String|max:255'
        ]);

        $familyMember = new FamilyMember();
        $familyMember->name = $request->input('name');
        $familyMember->gender = $request->input('gender');
        $familyMember->goal = $request->input('goal');
        $familyMember->eat = $request->input('eat');
        $familyMember->person()->associate(Auth::user()->person()->getResults());
        $familyMember->save();

        return redirect('/familyMember')->with('success', 'Neues Familienmitglied hinzugefügt');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255'
        ]);
    }

    public function destroy($id)
    {
        $familyMember = FamilyMember::find($id);
        $familyMember->delete();

        return redirect('/familyMember')->with('success', 'Familienmitglied gelöscht');
    }

    private function hasPersonFamilyMemberEntry($person)
    {
        $familyMembers = FamilyMember::all()->where('person_id', $person->id);

        if (count($familyMembers) === 0) {
            return false;
        }

        foreach ($familyMembers as $familyMember) {
            $name = $familyMember->name;
            if (strcmp($name, $person->name) === 0) {
                return true;
            }
        }
        return false;
    }

    private function createForPerson($person)
    {
        $familyMember = new FamilyMember();

        $familyMember->name = $person->name;
        $familyMember->person()->associate($person);

        $familyMember->save();
    }

}
