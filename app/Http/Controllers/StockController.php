<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\StockCategory;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return Inertia::render('Stocks/St',
        ['stocks'=>$stocks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $stock_categories = StockCategory::all();

        return Inertia::render('Stocks/Create',
        ['stock_categories' => $stock_categories]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate(

            [
                'id' => 'required|numeric|unique:stocks',
                'stock_category_id' => 'required|numeric|unique:stocks',
                'description' => 'required',
                'uom' => 'required',
                'barcode' => 'required|numeric',
                'discontinued' => 'required',

            ]

        );

        $model = new Stock();
        $model->id = $request->id;
        $model->stock_category_id = $request->stock_category_id;
        $model->description = $request->description;
        $model->uom = $request->uom;
        $model->barcode = $request->barcode;
        $model->discontinued= $request->discontinued;

        $model->save();

        return redirect()->back()->with('success', 'Stocks Added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
