<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Protypes;
use App\Models\Manufactures;
use Session;
use App\helper\Cart;

class CartController extends Controller
{
    //
    public function addCart(Request $req, $id)
    {
        try {
            $product = Products::where('id', $id)->first();
            // $products = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
            //     ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            //     ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            //     ->where('products.type_id', 1)
            //     ->orderBy('products.id', 'asc')
            //     ->paginate(6);
            
            if ($product != null) {
                $oldcart = Session('Cart') ? Session('Cart') : null;
                $newcart = new Cart($oldcart);
                $newcart->AddCart($product, $id);

                $req->session()->put('Cart', $newcart);
            }

            return response()->json([
                'view_1' => view('cart-items')->render(),
                'view_2' => view('list-cart')->render()
            ]);
            //return view('cart-items');
        } catch (\Exception $e) {
            //dd($e);
            abort(404);
        }
    }

    public function addQuantyCart(Request $req, $id, $quanty)
    {
        try {
            $product = Products::where('id', $id)->first();
            
            if ($product != null) {
                $oldcart = Session('Cart') ? Session('Cart') : null;
                $newcart = new Cart($oldcart);
                $newcart->AddQuantyCart($product, $id, $quanty);

                $req->session()->put('Cart', $newcart);
            }

            return response()->json([
                'view_1' => view('cart-items')->render(),
                'view_2' => view('list-cart')->render()
            ]);
            //return view('cart-items');
        } catch (\Exception $e) {
            //dd($e);
            abort(404);
        }
    }
    //
    public function deleteItemCart(Request $req, $id)
    {
        $oldcart = Session('Cart') ? Session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);

        if(count($newcart->products) > 0){
            $req->session()->put('Cart', $newcart);
        }
        else{
            $req->session()->forget('Cart');
        }
        
        return view('cart-items');
    }
    //
    public function viewListCart()
    {
        try {
            // $products = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
            //     ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            //     ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            //     ->where('products.type_id', 1)
            //     ->orderBy('products.id', 'asc')
            //     ->paginate(6);
            return view('list-cart');
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
    public function deleteListItemCart(Request $req, $id)
    {
        $oldcart = Session('Cart') ? Session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);

        if(count($newcart->products) > 0){
            $req->session()->put('Cart', $newcart);
        }
        else{
            $req->session()->forget('Cart');
        }
        
        return view('list-item-cart');
    }
    //
    public function saveListItemCart(Request $req, $id, $quanty){
        $oldcart = Session('Cart') ? Session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->UpdateItemCart($id, $quanty);

        $req->session()->put('Cart', $newcart);
        
        return view('list-item-cart');
    }
}