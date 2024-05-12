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
                
                foreach ($newcart->products as $item) {

                    if($item['productInfo']->id == $id){
                        if ($remain_quantity == 0) {
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Sản phẩm đã hết hàng.'
                            ]);
                        }
                        else if ($item['quanty'] > $remain_quantity) {
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Số lượng sản phẩm thêm vượt quá tồn kho.'
                            ]);
                        }
                        else if ($item['quanty'] > 10) {
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Mỗi sản phẩm chỉ thêm tối đa 10'
                            ]);
                        }
                    }
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
                'view_2' => view('list-cart', ['inventories' => $array])->render(),
                'view_3' => view('ajax.ajax_total_quanty_show')->render()

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

                foreach ($newcart->products as $item) {

                    if($item['productInfo']->id == $id){
                        if ($remain_quantity == 0) {
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Sản phẩm đã hết hàng.'
                            ]);
                        }
                        else if ($item['quanty'] > $remain_quantity) {
  
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Số lượng sản phẩm thêm vượt quá tồn kho.'
                            ]);
                        }
                        else if ($item['quanty'] > 10) {
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Mỗi sản phẩm chỉ thêm tối đa 10'
                            ]);
                        }
                    }
                }


                $req->session()->put('Cart', $newcart);

            }

            if (Session::has('Cart')) {
                $array = [];
                foreach (Session::get('Cart')->products as $item) {
                    $productInfo = $item['productInfo'];
                    $inventories = Inventories::where('product_id', $productInfo->id)->get();
                
                    $array[] = $inventories;
                }
            }

            return response()->json([
                'status' => 'success',
                'view_1' => view('cart-items', ['inventories' => $array])->render(),
                'view_2' => view('list-cart', ['inventories' => $array])->render(),
                'view_3' => view('ajax.ajax_total_quanty_show')->render()

            ]);


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


        return response()->json([
            'status' => 'success',
            'view_1' => view('cart-items')->render(),
            'view_2' => view('ajax.ajax_total_quanty_show')->render()
        ]);
        //return view('cart-items');

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

                $array[] = $inventories;
            }
            return response()->json([

                'view_1' => view('cart-items', ['inventories' => $array])->render(),
    
                'view_2' => view('list-item-cart', ['inventories' => $array])->render(),
                'view_3' => view('ajax.ajax_total_quanty_show')->render()
    
    
            ]);
        }
        
        return response()->json([

            'view_1' => view('cart-items')->render(),

            'view_2' => view('list-item-cart')->render(),
            'view_3' => view('ajax.ajax_total_quanty_show')->render()


        ]);

        

    }

    //

    public function saveListItemCart(Request $req, $id, $quanty)
    {

        $oldcart = Session('Cart') ? Session('Cart') : null;

        $newcart = new Cart($oldcart);

        $remain_quantity = Inventories::where('product_id', $id)->sum('remain_quantity');


        $newcart->UpdateItemCart($id, $quanty);

        if (Session::has('Cart')) {
            foreach (Session::get('Cart')->products as $item) {
                
                $productInfo = $item['productInfo'];
                $inventories = Inventories::where('product_id', $productInfo->id)->get();
                
                $array[] = $inventories;

                
            }
        }

        foreach ($newcart->products as $item) {
           
            if($item['productInfo']->id == $id){
                if ($remain_quantity == 0) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Sản phẩm đã hết hàng.'
                    ]);
                }
                else if ($item['quanty'] > $remain_quantity) {
                
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Số lượng sản phẩm thêm vượt quá tồn kho.'
                    ]);
                }
                else if ($item['quanty'] > 10) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Mỗi sản phẩm chỉ thêm tối đa 10'
                    ]);
                }
            }
        }

        $req->session()->put('Cart', $newcart);

        return response()->json([
            'status' => 'success',

            'view_1' => view('cart-items', ['inventories' => $array])->render(),

            'view_2' => view('list-item-cart', ['inventories' => $array])->render(),
            'view_3' => view('ajax.ajax_total_quanty_show')->render()


        ]);

        //return view('list-item-cart', ['inventories' => $array]);

    }

}