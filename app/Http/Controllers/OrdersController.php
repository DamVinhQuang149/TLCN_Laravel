<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Products;
use App\Models\Coupons;
use App\Models\Payments;

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
            $user_id = Auth::user()->user_id;
            $address = $req->address;
            $phone = $req->phone;
            $note = $req->note;
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
            ;
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