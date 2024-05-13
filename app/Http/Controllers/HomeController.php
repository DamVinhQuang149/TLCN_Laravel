<?php



namespace App\Http\Controllers;



use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\StarRating;
use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\FlashSales;

use App\Models\Inventories;

use App\Models\Manufactures;




class HomeController extends Controller
{

    //

    public function index()
    {

        $products = Products::get();

        $productsby1 = Products::where('type_id', 1)->get();

        $productsby2 = Products::where('type_id', 2)->get();

        $productsby3 = Products::where('type_id', 3)->get();

        $flashsales = FlashSales::get();

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