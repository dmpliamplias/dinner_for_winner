<?php

namespace App\Http\Controllers\FamilyMember;

use App\FamilyMember;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamilyMemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $families = Auth::user()->person()->getResults()->familyMembers()->getResults();
        return view('family.index')->with('families', $families);
    }

    public function create()
    {
        return view('family.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $familyMember = new FamilyMember();
        $familyMember->name = $request->input('name');
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

}

