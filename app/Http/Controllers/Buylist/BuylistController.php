<?php
namespace App\Http\Controllers\Buylist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Buylist;
use Barryvdh\DomPDF\Facade as PDF;

class BuylistController extends Controller
{

 public function index(){
   return view('buylist.index');
 }

 public function create_pdf(){
   $pdf = PDF::loadView ('buylist.index');
   return $pdf->download('Einkaufszettel.pdf');
 }

}
