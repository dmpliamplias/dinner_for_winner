<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Recipe\RecipeController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImportController1 extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('import.index');
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $json = json_decode(file_get_contents($file), true);

        if ($json == null) {
            return redirect('/import')->with('error', 'Datei konnte nicht importiert werden');
        }
        else {
            $this->createObjectFromJson($json);
            return redirect('/import')->with('success', 'Datei erfolgreich importiert');
        }
    }

    private function createObjectFromJson($json)
    {
        $object = $json['name'];
        if ($object->strcmp('Product') == 0) {
            ProductController::createFromJson($json);
        }
        if ($object->strcmp('Recipe') == 0) {
            RecipeController::createFromJson($json);
        }
    }

}
