<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class RateController extends Controller
{
    /**
     * Store Rating
     */
    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->orderIds); $i++) {
            $rate = new Rate();
            $rate->idPembeli = session("id");
            $rate->idPesanan = $request->orderIds[$i];
            $rate->idBuku = $request->bookIds[$i];
            $rate->markahPenilaian = $request->rateMarks[$i];
            $rate->save();
        }
        return redirect()->route("orders.history");
    }

    /**
     * Edit Rating
     */
    public function edit($id, Request $request)
    {
        $ratings = Rate::getOrderRatings($id, $request->bookIds);

        return view("rates.edit", compact("ratings"));
    }

    /**
     * Update Rating
     */
    public function update(Request $request)
    {
        for ($i = 0; $i < count($request->rateIds); $i++) {
            $rate = Rate::find($request->rateIds[$i]);
            $rate->markahPenilaian = $request->rateScores[$i];
            $rate->save();
        }
        return redirect()->route("orders.history");
    }
}
