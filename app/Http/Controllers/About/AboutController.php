<?php
namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    public function submitForm(Form $form){
            return("hello");
    }

    public function contactUSPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        ContactUS::create($request->all());

        return back()->with('success', 'Thanks for contacting us!');
    }
}
