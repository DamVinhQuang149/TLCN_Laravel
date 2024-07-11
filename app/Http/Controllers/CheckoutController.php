<?php



namespace App\Http\Controllers;



use App\helper\Cart;
use App\helper\checkout;

use App\Models\OrderDetails;
use App\Models\Products;
use Carbon\Carbon;

use App\Models\Coupons;
use App\Models\Users;
use Auth;

use App\Models\CouponTypes;


use Illuminate\Http\Request;


use Session;



class CheckoutController extends Controller
{

    //

    public function viewcheckout(Request $req)
    {

        $coupon_session = Session::get('Coupon');
        if ($coupon_session == true) {
            Session::forget('Coupon');
            
        }


        $reOrder = $req->resetorder;
        $order_id = $req->order_id;
        
        if ($reOrder == 1) {
            $req->session()->forget('Cart');
            $detailorder = OrderDetails::where('order_id', $order_id)->get();
            $oldcart = $req->session()->get('Cart', null);
            $newcart = new Cart($oldcart);

            if ($detailorder->isNotEmpty()) {
                foreach ($detailorder as $item) {
                    $product = Products::where('id', $item->product_id)->first();
                    if ($product != null) {
                        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng thì không thêm lại
                        if (!isset($newcart->products[$item->product_id])) {
                            $newcart->AddQuantyCart($product, $item->product_id, $item->product_quantity);
                        }
                    }
                }
                // Lưu giỏ hàng mới vào session
                $req->session()->put('Cart', $newcart);
                // Chuyển hướng sau khi đặt hàng lại để tránh lặp lại khi tải lại trang
                return redirect()->route('view.checkout', ['resetorder' => 0, 'order_id' => $order_id]);
            }
        }

        // Nếu giỏ hàng đã tồn tại, hiển thị trang checkout
        if ($req->session()->has('Cart')) {
            return view('checkout');
        }

        // Nếu không có điều kiện nào thỏa mãn, chuyển hướng về trang chủ
        return redirect()->route('index');
    }



    //

    public function processCoupon(Request $req, $coupon_code)
    {

        
        $coupon = Coupons::where('coupon_code', $coupon_code)

            ->whereDate('coupon_expired', '>', now()) // Thêm điều kiện ngày hiện tại lớn hơn ngày hết hạn

            ->first();

        if ($coupon) {

            $count_coupon = $coupon->count();

            if ($count_coupon > 0) {

                $coupon_session = Session::get('Coupon');

                if ($coupon_session == true) {

                    $is_available = 0;

                    if ($is_available == 0) {

                        $cou[] = array(

                            'coupon_id' => $coupon->coupon_id,

                            'coupon_code' => $coupon->coupon_code,

                            'coupon_type' => $coupon->coupon_type,

                            'coupon_amount' => $coupon->coupon_amount,

                            'coupon_quantity' => $coupon->coupon_quantity,

                            'coupon_remain' => $coupon->coupon_remain,

                            'coupon_used' => $coupon->coupon_used,

                            'min_order' => $coupon->min_order

                        );

                        Session::put('Coupon', $cou);

                    }

                } else {

                    $cou[] = array(

                        'coupon_id' => $coupon->coupon_id,

                        'coupon_code' => $coupon->coupon_code,

                        'coupon_type' => $coupon->coupon_type,

                        'coupon_amount' => $coupon->coupon_amount,

                        'coupon_quantity' => $coupon->coupon_quantity,

                        'coupon_remain' => $coupon->coupon_remain,

                        'coupon_used' => $coupon->coupon_used,

                        'min_order' => $coupon->min_order

                    );

                    Session::put('Coupon', $cou);

                }

                Session::save();

                return view('couponajax');

            }

        } else {

            $req->session()->forget('Coupon');

            return view('couponajax');

        }

    }

    public function unsetCoupon()
    {

        $coupon_session = Session::get('Coupon');
        if ($coupon_session == true) {
            Session::forget('Coupon');
            return redirect()->back();
        }
    }
    public function shippingFee($destination)
    {
        $destination_n = urlencode($destination);
        $origin = urlencode("01 Võ Văn Ngân, Linh Chiểu, Thủ Đức, Thành phố Hồ Chí Minh, Việt Nam");

        $api_key = "6Nx507Vba7K6LNBjXcAtf6Vq7FT217Huqz60QlPrEcJJ9ROQ6EKA7y0AfHiw7Yhy";
        $url = "https://api.distancematrix.ai/maps/api/distancematrix/json?origins={$origin}&destinations={$destination_n}&key={$api_key}";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);

        if ($data["status"] == "OK" && isset($data["rows"][0]["elements"][0]["distance"]["value"])) {
            $distance = $data["rows"][0]["elements"][0]["distance"]["value"];
            $duration = $data["rows"][0]["elements"][0]["duration"]["value"];

            $distance_in_km = $distance / 1000;
            $duration_in_minutes = $duration / 60;

            $pricePerKm = 1500;
            $distance_int = round($distance_in_km);
            $fee = 0;


            if ($distance_int > 2 && $distance_int < 25) {
                $additionalDistance = $distance_int;
                $fee += $additionalDistance * $pricePerKm;



                $user = Users::find(Auth::user()->user_id);
                $user->update([
                    'address' => $destination,
                ]);

                $shipping_fee = [
                    'address' => $destination,
                    'distance' => $distance_int,
                    'fee' => $fee,
                    'duration' => $duration_in_minutes
                ];
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Chúng tôi chỉ
                    giao vận trong phạm vi bán kính từ 2km - 25km!'
                ]);
            }

            Session::put('shipping_fee', $shipping_fee);
            Session::save();

            return response()->json([
                'status' => 'success',
                'shipping_fee_view' => view('ajax.ajax_shipping_fee')->render(),
                'total_price_view' => view('ajax.ajax_total_price')->render(),
                'coupon_amount_view' => view('ajax.ajax_coupon_amount')->render()
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Địa chỉ bạn nhập chưa hợp lệ, vui lòng nhập lại!'
            ]);
        }
    }



}