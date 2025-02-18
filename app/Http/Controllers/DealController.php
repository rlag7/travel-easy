<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;

class DealController extends Controller
{
    public function index(Request $request)
    {
        $deals = Deal::where('available', true);

        // Filters
        if ($request->has('destination')) {
            $deals->where('destination', $request->destination);
        }

        if ($request->has('price')) {
            $deals->orderBy('price', $request->price);
        }

        return view('deals', ['deals' => $deals->get()]);
    }
}

