<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Products;
use App\Models\Coupons;
use App\Models\Payments;
use App\Models\Inventories;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Auth;

use Illuminate\Support\Facades\Mail;

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
        $orders = Orders::join('users', 'orders.user_id', '=', 'users.user_id')
            ->select('orders.*', 'users.Last_name as name')
            ->orderBy('orders.order_id', 'desc')
            ->paginate(6);
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
    public function show($id, Request $request)
    {
        //
        $keyword = $request->input('keyword');

        $orders = Orders::select('orders.*', 'users.Last_name as name')
        ->join('users', 'orders.user_id', '=', 'users.user_id')
        ->where('orders.order_code', $keyword)
        ->orderBy('orders.order_id', 'desc')
        ->paginate(6);
        $status = Status::get();
    

        if ($orders) {
            // Nếu đơn hàng tồn tại, bạn có thể thực hiện các xử lý khác ở đây nếu cần
            return view('admin.orders.index', ['orders' => $orders, 'status' => $status]);
        }
        else{
            return redirect()->back()->with('error', 'This order could not be found');
        }
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
    public function destroy($order_id)
    {
        $orders = Orders::find($order_id);
        $status = 5;
        $orders->update(['status' => $status]);
        return redirect()->route('list.order')->with('success', 'Đã hủy đơn hàng!');
    }
    //

    public function order(Request $req)
    {
        if (Session::has('Cart')) {
            if (Session::has('shipping_fee') && Session::get('shipping_fee.distance') > 2 && Session::get('shipping_fee.distance') < 25) {
                // dd(Session::get('shipping_fee'));
                $user_id = Auth::user()->user_id;
                $address = $req->address;
                $phone = $req->phone;
                $note = $req->note;
                $shipping_fee = Session::get('shipping_fee.fee');

                if (Session::has('Coupon')) {
                    foreach (Session::get('Coupon') as $key => $cou) {
                        if ($cou['coupon_remain'] > 0 && $cou['min_order'] < Session::get('Cart')->totalPrice) {
                            $coupon_discount = $cou['coupon_amount'];
                        } else {
                            $coupon_discount = 0;
                        }
                    }
                } else {
                    $coupon_discount = 0;
                }
                $total = ($req->total > 0) ? $req->total : Session::get('Cart')->totalPrice;

                $checkout = $req->payment_method;

                $order_code = $user_id . "-" . date("dmY") . "-" . $total;
                
                // dd($shipping_fee);
                $order = Orders::create([
                    'user_id' => $user_id,
                    'address' => $address,
                    'order_code' => $order_code,
                    'shipping_fee' => $shipping_fee,
                    'phone' => $phone,
                    'coupon_discount' => $coupon_discount,
                    'note' => $note,
                    'total' => $total,
                    'checkout' => $checkout
                ]);

                if ($order != null) {
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

                        $inventories = Inventories::where("product_id", $product_id)->get();

                        foreach ($inventories as $inventory) {

                            if ($inventory->remain_quantity < $product_quantity) {
                                return redirect()->back()->with('error', 'Số lượng sản phẩm đặt hàng lớn hơn số lượng tồn kho! Vui lòng kiểm tra lại');
                            }
                        }
                    }
                    if ($order->checkout == 0) {
                        $status = 2;
                        $order->update([
                            'status' => $status
                        ]);
                        return redirect()->route('onlinepayment');
                    } else {
                        return redirect()->route('view.thanks')->with('success', 'Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');
                    }
                } else {
                    return redirect()->back();
                }
            } else {
                return redirect()->back()->with('error', 'Vui lòng tính phí ship trước khi đặt hàng!');
            }

        }
        return redirect()->route('index');
    }

    public function viewThanks(Request $req)
    {

        $order_id = $req->input('vnp_TxnRef');
        $total_cost = $req->input('vnp_Amount') / 100;
        $bankcode = $req->input('vnp_BankCode');
        $content = $req->input('vnp_OrderInfo');
        $card_type = $req->input('vnp_CardType');
        $status_cvt = $req->input('vnp_ResponseCode');
        $status = 0;

        $order_idmax = Orders::select('*')->max('order_id');
        $order = Orders::where('order_id', $order_idmax)->first();

        if ($status_cvt == '00') {
            $status_bank = 'Thanh toán thành công';
            $status = 3;
        } else {
            $status_bank = 'Thanh toán thất bại';
            $status = 6;
        }
        if (!empty($order_id)) {
            Payments::create([
                'order_id' => $order_id,
                'total_cost' => $total_cost,
                'bankcode' => $bankcode,
                'content' => $content,
                'card_type' => $card_type,
                'status' => $status_bank
            ]);

            $order = Orders::find($order_id);
            if ($order) {
                $order->update([
                    'status' => $status
                ]);
            }
        }

        if ($order->status == 0 || $order->status == 3) {
            // gửi email cho khách hàng về thông tin đã đặt hàng
            $user = User::select()->where('user_id', auth()->id())->first();
            $orderdetails = OrderDetails::select('order_details.*', 'products.id', 'products.discount_price', 'protypes.*')

                ->join('products', 'order_details.product_id', '=', 'products.id')

                ->join('protypes', 'products.type_id', '=', 'protypes.type_id')

                ->where('order_id', $order_idmax)

                ->get();

            Mail::send("emails.order-success", ['orderdetails' => $orderdetails, 'user' => $user, 'order' => $order], function ($message) use ($user) {

                $message->to($user->email);

                $message->subject("Thông báo về đơn đặt hàng");

            });
            //
            $userAdmin = 'capplevip12345@gmail.com';
            //Gửi email thông báo cho admin có đơn hàng mới
            Mail::send("emails.new-order-notification", ['orderdetails' => $orderdetails, 'user' => $user, 'order' => $order], function ($message) use ($userAdmin) {

                $message->to($userAdmin);

                $message->subject("Thông báo về đơn đặt hàng mới");

            });
            //
            //Tồn kho
            foreach (Session::get('Cart')->products as $item) {

                $product_quantity = $item['quanty'];
                $product_id = $item['productInfo']->id;

                $inventories = Inventories::where("product_id", $product_id)->get();

                foreach ($inventories as $inventory) {
                    $remain_quantity = $inventory->remain_quantity - $product_quantity;
                    if ($remain_quantity < 7 && $remain_quantity > 0) {
                        $status = "Nearly Out Of Stock";
                    } elseif ($remain_quantity == 0) {
                        $status = "Out Of Stock";

                    } else {
                        $status = "In Stock";
                    }

                    $inventory->sold_quantity = $inventory->sold_quantity + $product_quantity;
                    $inventory->remain_quantity = $remain_quantity;
                    $inventory->inventory_status = $status;
                    $inventory->save();
                    //

                    if ($inventory->inventory_status == "Nearly Out Of Stock" || $inventory->inventory_status == "Out Of Stock") {
                        Mail::send("emails.inventory-quantity-notification", ['inventory' => $inventory], function ($message) use ($userAdmin) {

                            $message->to($userAdmin);

                            $message->subject("Thông báo về số lượng tồn kho");

                        });
                    }
                }

            }
        }
        if (Session::has('Coupon')) {
            foreach (Session::get('Coupon') as $key => $cou) {
                if ($cou['coupon_remain'] > 0 && $cou['min_order'] < Session::get('Cart')->totalPrice) {
                    $coupon_used = $cou['coupon_used'] + 1;
                    $coupon_remain = $cou['coupon_quantity'] - $coupon_used;

                    Coupons::find($cou['coupon_id'])->update([
                        'coupon_used' => $coupon_used,
                        'coupon_remain' => $coupon_remain,
                    ]);
                }
                $req->session()->forget('Coupon');
            }
        }
        if (Session::has('Cart')) {
            $req->session()->forget('Cart');
        }
        if (Session::has('shipping_fee')) {
            $req->session()->forget('shipping_fee');
        }
        return view('thanks')->with('success', 'Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');
    }

    public function listOrder()
    {
        $user_id = Auth::user()->user_id;
        $list_order = Orders::select('orders.*', 'users.Last_name as name')
            ->join('users', 'orders.user_id', '=', 'users.user_id')
            ->where('orders.user_id', $user_id)
            ->orderBy('orders.order_id', 'desc')
            ->paginate(6);
        $status = Status::get();
        return view('list-order', ['listorder' => $list_order, 'status' => $status]);
    }
    public function canceledOrder($order_id)
    {
        $orders = Orders::find($order_id);
        $status = 5;

        $inventories = Inventories::get();
        $orderDetail = OrderDetails::select('order_details.*', 'products.id', 'products.discount_price', 'protypes.*')

            ->join('products', 'order_details.product_id', '=', 'products.id')

            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')

            ->where('order_id', $order_id)

            ->get();
        foreach ($orderDetail as $item) {
            foreach ($inventories as $value) {
                if ($item->product_id == $value->product_id) {
                    $quantity = $item->product_quantity;
                    $remain_quantity = $quantity + $value->remain_quantity;
                    $sold_quantity = $value->sold_quantity - $quantity;
                    if ($remain_quantity < 7 && $remain_quantity > 0) {
                        $inventory_status = "Nearly Out Of Stock";
                    } elseif ($remain_quantity == 0) {
                        $inventory_status = "Out Of Stock";
                    } else {
                        $inventory_status = "In Stock";
                    }
                    $inventory = Inventories::where('product_id', $item->product_id)->first();
                    if ($inventory) {
                        $inventory->update([
                            'remain_quantity' => $remain_quantity,
                            'sold_quantity' => $sold_quantity,
                            'inventory_status' => $inventory_status,
                        ]);
                    }
                }
            }
        }
        $user = User::select()->where('user_id', auth()->id())->first();
        $userAdmin = 'capplevip12345@gmail.com';
        Mail::send("emails.canceled-order-notification", ['orderdetails' => $orderDetail, 'user' => $user, 'order' => $orders], function ($message) use ($userAdmin) {

            $message->to($userAdmin);

            $message->subject("Thông báo về đơn đặt hàng bị hủy");

        });
        $orders->update(['status' => $status]);
        return redirect()->route('list.order')->with('success', 'Đã hủy đơn hàng!');
    }
    public function receivedOrder($order_id)
    {
        $orders = Orders::find($order_id);
        $status = 1;
        $orders->update(['status' => $status]);
        return redirect()->route('list.order')->with('success', 'Nhận hàng thành công! Cảm ơn bạn đã sử dụng dịch vụ!');
    }
    public function Reorder(Request $req, $order_id)
    {
        $detailorder = OrderDetails::select()->where('order_id', $order_id)->get();
        foreach ($detailorder as $item) {
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

    public function onlinepayment(Request $request)
    {
        $total_cost = $request->session()->get('total_coupon', Session::get('Cart')->totalPrice);

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('view.thanks');
        $vnp_TmnCode = "QMDPZXRE"; // Mã website tại VNPAY
        $vnp_HashSecret = "KOOETMNNKHBDNPRBMVTKSRHYBPDNCZEQ"; // Chuỗi bí mật

        $order_idmax = Orders::max('order_id');
        $vnp_TxnRef = $order_idmax;
        $vnp_OrderInfo = $order_idmax;
        $vnp_Amount = $total_cost * 100;
        $vnp_Locale = 'vn'; // Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = $request->input('bankCode'); // Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; // IP Khách hàng thanh toán

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => "bill payment",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect()->to($vnp_Url);
    }
}