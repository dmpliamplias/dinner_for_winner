<?php

namespace App\Http\Controllers\Buylist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Buylist;
use Barryvdh\DomPDF\Facade as PDF;

class BuylistController extends Controller
{

    public function index()
    {
        return view('buylist.index');
    }

    public function create_pdf()
    {
        $data = [0, 9, 324];
        $pdf = PDF::loadView('buylist.pdf', ['data' => $data]);

        return $pdf->download('Einkaufszettel.pdf');
    }

}
