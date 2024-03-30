<?php



namespace App\Http\Controllers;



use App\helper\checkout;

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

    public function viewcheckout()
    {

        if (Session::has('Cart')) {

            return view('checkout');

        } else {

            return redirect()->route('index');

        }



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

        $user = Users::find(Auth::user()->user_id);
        $user->update([
            'address' => $destination,
        ]);

        // var_dump($destination);
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

        if ($data["status"] == "OK") {
            $distance = $data["rows"][0]["elements"][0]["distance"]["value"];
            $duration = $data["rows"][0]["elements"][0]["duration"]["value"];

            $distance_in_km = $distance / 1000;

            //$duration_in_minutes = $duration / 60;


            $minPrice = 10000;
            $pricePerKm = 1000;
            //$pricePerMinute = 100;
            $fee = $minPrice;
            $distance_int = round($distance_in_km);
            if ($distance_in_km > 2) {
                $additionalDistance = $distance_int - 2;
                $fee += $additionalDistance * $pricePerKm;
            }



            //var_dump($fee);

            Session::put('shipping_fee', $fee);

            return response()->json([
                'shipping_fee_view' => view('ajax/ajax_shipping_fee', ['fee' => $fee])->render(),
                'coupon_view' => view('couponajax')->render()
            ]);

            // return view('ajax/ajax_shipping_fee');

            //return array("distance" => $distance_in_km, "duration" => $duration_in_minutes);
        } else {
            return redirect()->back();
        }
    }


}