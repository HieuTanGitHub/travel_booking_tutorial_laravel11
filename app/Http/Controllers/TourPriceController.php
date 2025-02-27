<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourPrice;

class TourPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $tourprice = new TourPrice();
        $tourprice->tour_id = $data['tour_id'];
        $tourprice->adult = $data['tour_id'];
        $tourprice->children6_11 = $data['children6_11'];
        $tourprice->children5 = $data['children5'];
        $tourprice->children2 = $data['children2'];
        $tourprice->save();
        toastr()->success('Thêm giá cho tour thành công.', 'Created');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
