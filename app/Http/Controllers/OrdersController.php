<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Products;

use Illuminate\Http\Request;
use Session;
use Auth;

use App\helper\Cart;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::orderBy('order_id', 'desc')->paginate(6);
        $status = Status::get();
        return view('admin.orders.index', ['orders' => $orders, 'status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $status = Status::get();
        $orderbyid = Orders::select()->where('order_id', $id)->get();
        return view('admin.orders.status', ['orderbyid' => $orderbyid, 'status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order_id)
    {
        $orders = Orders::find($order_id);
        $status = $request->input('status');
        $orders->update(['status' => $status]);
        return redirect('admin/orders')->with('success', 'Update Order Status Successfully!');
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
    //

    public function order(Request $req){
        $user_id = Auth::user()->user_id;
        $address = $req->address;
        $phone = $req->phone;
        $note = $req->note;
        if(Session::has('Coupon')){
            foreach (Session::get('Coupon') as $key => $cou){
                $coupon_discount = $cou['coupon_amount'];
            }
        }
        else{
            $coupon_discount = 0;
        }
        $total = ($req->total > 0) ? $req->total : Session::get('Cart')->totalPrice;;
        $checkout = $req->payment_method;
        $order = Orders::create([
            'user_id' => $user_id, 
            'address' => $address, 
            'phone' => $phone, 
            'coupon_discount' => $coupon_discount,
            'note' => $note, 
            'total' => $total,
            'checkout' => $checkout
        ]);
        if($order != null){
            $order_id = $order->order_id;
            foreach (Session::get('Cart')->products as $item) {
                $price = $item['price1'];
                $product_name = $item['productInfo']->name;
                $product_quantity = $item['quanty'];
                $cost = $item['price'];
                $product_id = $item['productInfo']->id;
                $type_id = $item['productInfo']->type_id;
                $product_image = $item['productInfo']->pro_image;

                $orderdetail = OrderDetails::create([
                    'order_id' => $order_id, 
                    'product_name' => $product_name, 
                    'discount_price' => $price, 
                    'product_quantity' => $product_quantity, 
                    'cost' => $cost, 
                    'product_id' => $product_id, 
                    'type_id' => $type_id, 
                    'product_image' => $product_image
                ]);
            }
            
            if($order->checkout == 0){

                return redirect()->route('onlinepayment');
            }
            else{
                // foreach (Session::get('Coupon') as $key => $cou){

                // }
                $req->session()->forget('Cart');
                return redirect()->route('view.thanks');
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function viewThanks(){
        return view('thanks');
    }

    public function listOrder(){
        $user_id = Auth::user()->user_id;
        $list_order = Orders::select()->where('user_id', $user_id)->paginate(6);
        $status = Status::get();
        return view('list-order', ['listorder' => $list_order, 'status' => $status]);
    }
    public function canceledOrder($order_id){
        $orders = Orders::find($order_id);
        $status = 5;
        $orders->update(['status' => $status]);

        return redirect()->route('list.order');
    }
    public function Reorder(Request $req, $order_id){
        $detailorder = OrderDetails::select()->where('order_id', $order_id)->get();
        foreach($detailorder as $item){
            $product = Products::where('id', $item->product_id)->first();
            
            if ($product != null) {
                $oldcart = Session('Cart') ? Session('Cart') : null;
                $newcart = new Cart($oldcart);
                $newcart->AddQuantyCart($product, $item->product_id, $item->product_quantity);

                $req->session()->put('Cart', $newcart);
            }
        }
        return view('checkout');
    }
}