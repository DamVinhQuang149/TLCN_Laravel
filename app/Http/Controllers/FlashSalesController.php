<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\FlashSales;
use App\Models\Products;
use Illuminate\Http\Request;

class FlashSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = FlashSales::all();
        $products = Products::all();
        $flashsales = FlashSales::orderBy('end_date', 'desc')->paginate(10);
        return view(
            'admin.flashsales.index',
            [
                'flashsales' => $flashsales,
                'products' => $products,
                'all' => $all
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flashsales = FlashSales::get();
        $products = Products::orderBy('id', 'asc')->get();
        return view(
            'admin.flashsales.create',
            [
                'flashsales' => $flashsales,
                'products' => $products,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sales_rate = $request->input("import-salesrate");
        $original_price = $request->input("show-price");
        $product_id = $request->input("pro");
        $end_time = $request->input('flash-sales-end-time');
        $existingFlashSale = FlashSales::where('product_id', $product_id)->first();
        if ($existingFlashSale) {
            return redirect('admin/flashsales')->with('error', 'This product is already exist!');
        }
        $product = Products::find($product_id);
        $initial_price = $product->discount_price;
        if (!$end_time || !Carbon::hasFormat($end_time, 'Y-m-d\TH:i')) {
            return redirect('admin/flashsales')->with('error', 'Invalid end time!');
        }
        $end_time = Carbon::createFromFormat('Y-m-d\TH:i', $end_time);
        $current_time = Carbon::now();
        if ($end_time <= $current_time->copy()->addDay()) {
            return redirect('admin/flashsales')->with('error', 'End time must be at least one day from current time!');
        }
        if ($sales_rate == null || $original_price == null)
            return redirect('admin/flashsales')->with('error', 'Please choose a product!');
        if ($sales_rate < 40 || $sales_rate > 50) {
            return redirect('admin/flashsales')->with('error', 'Sales price must be reduce from 40% - 50% original price!');
        }
        $discount_price = ($original_price * (100 - $sales_rate)) / 100;
        $product->discount_price = $discount_price;
        $product->save();
        $flashsales = FlashSales::create([
            'product_id' => $product_id,
            'initial_price' => $initial_price,
            'end_date' => $end_time,
        ]);
        $flashsales->save();
        return redirect('admin/flashsales')->with('success', 'Action Successfully!');
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
        $flashsalesbyid = FlashSales::find($id);
        $product = Products::find($flashsalesbyid->product_id);
        $saleRate = (($product->price - $product->discount_price)/$product->price)*100;

        return view(
            'admin.flashsales.update',
            [
                'flashsalesbyid' => $flashsalesbyid,
                'product' => $product,
                'saleRate' => $saleRate
            ]
        );
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
        $sales_rate = $request->input("import-salesrate");
        $original_price = $request->input("show-price");

        $end_time = $request->input('flash-sales-end-time');
        $flashsales = FlashSales::find($id);
        $product = Products::find($flashsales->product_id);

        if (!$end_time || !Carbon::hasFormat($end_time, 'Y-m-d\TH:i')) {
            return redirect('admin/flashsales')->with('error', 'Invalid end time!');
        }

        $end_time = Carbon::createFromFormat('Y-m-d\TH:i', $end_time);
        $current_time = Carbon::now();
        if ($end_time <= $current_time->copy()->addDay()) {
            return redirect('admin/flashsales')->with('error', 'End time must be at least one day from current time!');
        }

        if ($sales_rate == null || $original_price == null)
            return redirect('admin/flashsales')->with('error', 'Please choose a product!');
        if ($sales_rate < 40 || $sales_rate > 50) {
            return redirect('admin/flashsales')->with('error', 'Sales price must be reduce from 40% - 50% original price!');
        }

        $discount_price = ($original_price * (100 - $sales_rate)) / 100;

        $product->update([
            'discount_price' => $discount_price
        ]);

        $flashsales->update([
            'end_date' => $end_time,
        ]);

        return redirect('admin/flashsales')->with('success', 'Update Successfully!');
        
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
        $flashsale = FlashSales::find($id);
        $product = Products::find($flashsale->product_id);
        $product->update([
            'discount_price' => $flashsale->initial_price
        ]);
        $flashsale->delete();
        return redirect('admin/flashsales')->with('success', 'Delete Successfully!');
    }
}