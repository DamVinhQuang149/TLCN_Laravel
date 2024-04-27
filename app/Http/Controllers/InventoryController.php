<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Inventories;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventories::orderBy('created_at', 'desc')->paginate(10);
        return view(
            'admin.inventories.index',
            [
                'inventories' => $inventories
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
        $inventories = Inventories::get();
        $products = Products::orderBy('id', 'asc')->get();
        return view(
            'admin.inventories.create',
            [
                'products' => $products,
                'inventories' => $inventories
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $product_id = $request->input("pro");
    //     $import_quantity = $request->input("import-quantity");
    //     $products = Products::get();
    //     $invent = Inventories::get();

    //     foreach ($products as $item) {
    //         if ($item->id == $product_id) {
    //             $product_image = $item['pro_image'];
    //             $product_name = $item['name'];
    //         }
    //     }
    //     foreach ($invent as $item) {
    //         if ($product_id == $item->product_id) {
    //             return redirect('admin/inventories')->with('warning', 'This product was already imported');
    //         }
    //     }
    //     if ($import_quantity < 10) {
    //         return redirect('admin/inventories')->with('warning', 'Import quantity minimum 10!');
    //     }
    //     $inventories = Inventories::create([
    //         'product_name' => $product_name,
    //         'product_image' => $product_image,
    //         'product_id' => $product_id,
    //         'import_quantity' => $import_quantity,
    //         'sold_quantity' => 0,
    //         'remain_quantity' => $import_quantity,
    //         'inventory_status' => 'In Stocks',
    //     ]);
    //     $inventories->save();
    //     return redirect('admin/inventories')->with('success', 'Import Successfully!');
    // }

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
        $inventories = Inventories::select()->where('inventory_id', $id)->get();
        return view('admin.inventories.update', ['inventories' => $inventories]);
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
        $inventories = Inventories::find($id);

        $remain_quantity = $request->input('remain_quantity');
        // dd($remain_quantity, $inventories->sold_quantity);
        if ($remain_quantity < $inventories->sold_quantity) {
            return redirect('admin/inventories')->with('error', 'Remain quantity must be greater than or equal sold quantity');
        }
        // dd($remain_quantity);
        if ($remain_quantity < 7 && $remain_quantity > 0) {
            $status = "Nearly Out Of Stock";
        } elseif ($remain_quantity == 0) {
            $status = "Out Of Stock";
        } else {
            $status = "In Stock";
        }
        $inventories->update(
            [
                'remain_quantity' => $remain_quantity,
                'inventory_status' => $status,
            ]
        );
        $inventories->save();
        return redirect('admin/inventories')->with('success', 'Update Inventorie Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventories = Inventories::find($id);
        $inventories->delete();
        return redirect('admin/inventories')->with('success', "Delete Inventory's Product Successfully!");
    }
}