<?php

namespace Mukuru\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mukuru\Models\Rate;

class PagesController extends Controller
{
    public function homepage(Request $request, Rate $rate)
    {
        $currencies = $rate->all();

        return view('index')
            ->with('currencies', $currencies);
    }
}
