<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Coupons;
use App\Models\CouponTypes;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
    //
    public function viewcheckout(){
        return view('checkout');
    }
    //
    public function processCoupon(Request $req, $coupon_code){
        
        $coupon = Coupons::where('coupon_code', $coupon_code)->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('Coupon');
                if($coupon_session==true){
                    $is_available = 0;
                    if($is_available == 0){
                        $cou[] = array(
                            'coupon_code' =>$coupon->coupon_code,
                            'coupon_type' =>$coupon->coupon_type,
                            'coupon_amount' =>$coupon->coupon_amount,
                            'coupon_quantity' =>$coupon->coupon_quantity,
                            'coupon_remain' =>$coupon->coupon_remain,
                            'coupon_used' =>$coupon->coupon_used,
                            'min_order' =>$coupon->min_order
                        );
                        Session::put('Coupon', $cou);
                    }
                }
                else{
                    $cou[] = array(
                        'coupon_code' =>$coupon->coupon_code,
                        'coupon_type' =>$coupon->coupon_type,
                        'coupon_amount' =>$coupon->coupon_amount,
                        'coupon_quantity' =>$coupon->coupon_quantity,
                        'coupon_remain' =>$coupon->coupon_remain,
                        'coupon_used' =>$coupon->coupon_used,
                        'min_order' =>$coupon->min_order
                    );
                    Session::put('Coupon', $cou);
                }
                Session::save();
                return view('couponajax');
            }
        }else{
            $req->session()->forget('Coupon');
            return view('couponajax');
        }
    }
    public function unsetCoupon(){
        $coupon_session = Session::get('Coupon');

        if($coupon_session==true){
            Session::forget('Coupon');
            return redirect()->back();
        }
    }
}