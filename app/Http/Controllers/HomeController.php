<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Protypes;
use App\Models\Manufactures;

class HomeController extends Controller
{
    //
    public function index(){
        $products = Products::get();
        $productsby1 = Products::where('type_id', 1)->get();
        $productsby2 = Products::where('type_id', 2)->get();
        $productsby3 = Products::where('type_id', 3)->get();

        $productsFeatureBy1 = Products::where('type_id', 1)->where('feature', 1)->get();
        $productsFeatureBy2 = Products::where('type_id', 2)->where('feature', 1)->get();
        $productsFeatureBy3 = Products::where('type_id', 3)->where('feature', 1)->get();

        return view('index', [
            'products' => $products, 
            'productsby1' => $productsby1, 
            'productsby2' => $productsby2, 
            'productsby3' => $productsby3,
            'productsFeatureBy1' => $productsFeatureBy1,
            'productsFeatureBy2' => $productsFeatureBy2,
            'productsFeatureBy3' => $productsFeatureBy3
        ]);
    }
}