<?php
namespace App\Http\Controllers\Buylist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Buylist;

class BuylistController extends Controller
{

 public function index(){
   return view('buylist.index');
 }

}
