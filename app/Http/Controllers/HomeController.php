<?php



namespace App\Http\Controllers;



use Carbon\Carbon;
use App\Models\StarRating;


use App\Models\Products;
use App\Models\FlashSales;

use App\Models\Inventories;





class HomeController extends Controller
{

    //

    public function index()
    {

        $products = Products::get();
        $productupdate = Products::get();
        $productsby1 = Products::where('type_id', 1)->get();

        $productsby2 = Products::where('type_id', 2)->get();

        $productsby3 = Products::where('type_id', 3)->get();
        $flashsaleold = FlashSales::all();
        foreach ($flashsaleold as $item) {
            foreach ($productupdate as $pro) {
                if ($item) {
                    if ($item->product_id === $pro->id) {
                        if ($item->end_date <= Carbon::now()) {
                            $price = $item->initial_price;
                            $pro->update([
                                'discount_price' => $price,
                            ]);
                        }
                    }
                }

            }
        }
        $flashsales = FlashSales::where('end_date', '>=', Carbon::now())->get();
        $countfls = $flashsales->count();
        $productsFeatureBy1 = Products::where('type_id', 1)->where('feature', 1)->get();

        $productsFeatureBy2 = Products::where('type_id', 2)->where('feature', 1)->get();

        $productsFeatureBy3 = Products::where('type_id', 3)->where('feature', 1)->get();
        $inventories = Inventories::all();
        $products->each(function ($product) {
            $product->average_rating = StarRating::where('product_id', $product->id)->avg('star');
        });
        $productsby1->each(function ($productsby1) {
            $productsby1->average_rating = StarRating::where('product_id', $productsby1->id)->avg('star');
        });
        $productsby2->each(function ($productsby2) {
            $productsby2->average_rating = StarRating::where('product_id', $productsby2->id)->avg('star');
        });
        $productsby3->each(function ($productsby3) {
            $productsby3->average_rating = StarRating::where('product_id', $productsby3->id)->avg('star');
        });



        return view('index', [

            'products' => $products,
            'flashsales' => $flashsales,
            'countfls' => $countfls,
            'productsby1' => $productsby1,
            'productsby2' => $productsby2,
            'productsby3' => $productsby3,
            'productsFeatureBy1' => $productsFeatureBy1,
            'productsFeatureBy2' => $productsFeatureBy2,
            'productsFeatureBy3' => $productsFeatureBy3,
            'inventories' => $inventories

        ]);

    }

}