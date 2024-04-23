<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Products;

use App\Models\Protypes;

use App\Models\Manufactures;
use App\Models\Inventories;

use Session;

use App\helper\Cart;



class CartController extends Controller
{

    //

    public function addCart(Request $req, $id)
    {

        try {
            $product = Products::findOrFail($id);
            $remain_quantity = Inventories::where('product_id', $product->id)->sum('remain_quantity');
    
            if ($product != null) {
                $oldcart = $req->session()->has('Cart') ? $req->session()->get('Cart') : null;
                $newcart = new Cart($oldcart);
                $newcart->AddCart($product, $id);
    
                if ($newcart->totalQuanty > $remain_quantity) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Số lượng sản phẩm trong giỏ hàng vượt quá số lượng tồn kho hoặc sản phẩm đã hết hàng.'
                    ]);
                }
    
                $req->session()->put('Cart', $newcart);
            }
    
            $array = [];
            foreach ($newcart->products as $item) {
                $productInfo = $item['productInfo'];
                $inventories = Inventories::where('product_id', $productInfo->id)->get();
                $array[] = $inventories;
            }
    
            return response()->json([
                'status' => 'success',
                'view_1' => view('cart-items', ['inventories' => $array])->render(),
                'view_2' => view('list-cart', ['inventories' => $array])->render()
            ]);
        } catch (\Exception $e) {
            abort(404);
        }

    }



    public function addQuantyCart(Request $req, $id, $quanty)
    {

        try {

            $product = Products::where('id', $id)->first();

            $remain_quantity = Inventories::where('product_id', $product->id)->sum('remain_quantity');

            if ($product != null) {

                $oldcart = Session('Cart') ? Session('Cart') : null;

                $newcart = new Cart($oldcart);

                $newcart->AddQuantyCart($product, $id, $quanty);

                if ($newcart->totalQuanty > $remain_quantity) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Số lượng sản phẩm trong giỏ hàng vượt quá số lượng tồn kho hoặc sản phẩm đã hết hàng.'
                    ]);
                }


                $req->session()->put('Cart', $newcart);

            }

            if (Session::has('Cart')) {
                $array = [];
                foreach (Session::get('Cart')->products as $item) {
                    $productInfo = $item['productInfo'];
                    $inventories = Inventories::where('product_id', $productInfo->id)->get();
                    // dd($inventories->product_id);
                    $array[] = $inventories;
                }
            }

            // return response()->json([

            //     'view_1' => view('cart-items', ['inventories' => $array])->render(),

            //     'view_2' => view('list-cart', ['inventories' => $array])->render()

            // ]);
            return response()->json([
                'status' => 'success',
                'view_1' => view('cart-items', ['inventories' => $array])->render(),
                'view_2' => view('list-cart', ['inventories' => $array])->render()
            ]);

            return view('cart-items');

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



        if (count($newcart->products) > 0) {

            $req->session()->put('Cart', $newcart);

        } else {

            $req->session()->forget('Cart');

        }



        return view('cart-items');

    }

    //

    public function viewListCart()
    {

        try {
            if (Session::has('Cart')) {
                $array = [];
                foreach (Session::get('Cart')->products as $item) {
                    $productInfo = $item['productInfo'];
                    $inventories = Inventories::where('product_id', $productInfo->id)->get();
                    // dd($inventories->product_id);
                    $array[] = $inventories;
                }
                return view('list-cart', ['inventories' => $array]);
            } else {
                return view('list-cart');
            }
            
        } catch (ModelNotFoundException $e) {

            abort(404);

        }

    }

    public function deleteListItemCart(Request $req, $id)
    {

        $oldcart = Session('Cart') ? Session('Cart') : null;

        $newcart = new Cart($oldcart);

        $newcart->DeleteItemCart($id);



        if (count($newcart->products) > 0) {

            $req->session()->put('Cart', $newcart);

        } else {

            $req->session()->forget('Cart');

        }

        if (Session::has('Cart')) {
            foreach (Session::get('Cart')->products as $item) {
                $productInfo = $item['productInfo'];
                $inventories = Inventories::where('product_id', $productInfo->id)->get();
                // dd($inventories->product_id);
                $array[] = $inventories;
            }
            return view('list-item-cart', ['inventories' => $array]);
            
        } else{
            return view('list-item-cart');
        }

        

    }

    //

    public function saveListItemCart(Request $req, $id, $quanty)
    {

        $oldcart = Session('Cart') ? Session('Cart') : null;

        $newcart = new Cart($oldcart);

        $newcart->UpdateItemCart($id, $quanty);

        if (Session::has('Cart')) {
            foreach (Session::get('Cart')->products as $item) {
                $productInfo = $item['productInfo'];
                $inventories = Inventories::where('product_id', $productInfo->id)->get();
                // dd($inventories->product_id);
                $array[] = $inventories;
            }
        }

        $req->session()->put('Cart', $newcart);

        // return response()->json([

        //     'view_1' => view('cart-items', ['inventories' => $array])->render(),

        //     //'view_2' => view('list-cart', ['inventories' => $array])->render()

        // ]);

        return view('list-item-cart', ['inventories' => $array]);

    }

}