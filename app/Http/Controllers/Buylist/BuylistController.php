<?php

namespace App\Http\Controllers\Buylist;

use App\Calendar;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class BuylistController extends Controller
{

    public function index()
    {
        $values = $this->getBuylistValues();

        if (sizeof($values) === 0) {
            return view('buylist.index')->with('error', 'Keine bestätigte Rezepte vorhanden');
        }

        return view('buylist.index')->with(['products' => $values[0], 'totalPrice' => $values[1], 'familyCount' => $values[2]]);
    }

    public function createPdf()
    {
        $values = $this->getBuylistValues();
        $pdf = PDF::loadView('buylist.pdf', ['products' => $values[0], 'totalPrice' => $values[1], 'familyCount' => $values[2]]);

        return $pdf->download('Einkaufszettel.pdf');
    }

    private function getBuylistValues()
    {
        $person = Auth::user()->person()->getResults();

        $calendarEntries = Calendar::all()
            ->where('person_id', $person->id)
            ->where('kw', date("W", time()))
            ->where('confirmed', true);

        $data = [];
        if (sizeof($calendarEntries) === 0) {
            return $data;
        }

        $familyCount = count($person->familyMembers()->getResults());
        $totalPrice = 0;
        $i = 0;
        foreach ($calendarEntries as $entry) {
            $products = $entry->recipe()->getResults()->products()->getResults();
            foreach ($products as $product) {
                $data[$i] = $product;
                $totalPrice += $product->price;
                $i++;
            }
        }
        return [$data, $totalPrice, $familyCount];
    }

}
