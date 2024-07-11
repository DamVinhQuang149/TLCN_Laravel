<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Carbon\Carbon;
use App\Models\Favorites;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\StarRating;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Protypes;
use App\Models\Manufactures;
use App\Models\Comments;
use App\Models\Inventories;
use App\Models\FlashSales;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class ProductsController extends Controller
{
    // public function __contruct(){
    //     $this->middleware('user');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productAll = Products::all();
        $products = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
            ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->orderBy('products.id', 'desc')
            ->paginate(10);
        return view('admin.products.index', ['products' => $products, 'productAll' => $productAll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufactures = Manufactures::get();
        $protypes = Protypes::get();
        return view('admin.products.create', ['manufactures' => $manufactures, 'protypes' => $protypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->getClientOriginalName();
        $target_dir = asset('assets/img/');
        $target_file = $target_dir . basename($image);

        $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        $name = $request->input('name');
        $manu = $request->input('manu');
        $type = $request->input('type');
        $price = $request->input('price');
        $desc = $request->input('desc');
        $feature = $request->input('feature');
        $discount_price = $request->input('discount_price');
        $import_quantity = $request->input('import_quantity');

        if ($import_quantity < 10) {
            return redirect('admin/products')->with('warning', 'Import quantity minimum 10!');
        }

        if (!is_numeric($price) || !is_numeric($discount_price)) {
            return redirect('admin/products')->with('warning', 'Price and discount price must be numeric!');
        }
        switch (true) {
            case empty($manu):
                return redirect('admin/products')->with('error', 'Please Choose A Manufacture!');
            case empty($type):
                return redirect('admin/products')->with('error', 'Please Choose A Product Type!');
            case empty($desc):
                return redirect('admin/products')->with('error', 'Please Enter Description!');
            case is_null($feature):
                return redirect('admin/products')->with('error', 'Please Choose A Feature!');
            default:
                if ($imgFileType == 'png' || $imgFileType == 'jpg' || $imgFileType == 'webp') {
                    $image_name = 'image' . time() . '-' . $request->name . '.'
                        . $request->image->extension();
                    $request->image->move('assets/img', $image_name);
                    $products = Products::create([
                        'name' => $name,
                        'manu_id' => $manu,
                        'type_id' => $type,
                        'description' => $desc,
                        'price' => $price,
                        'discount_price' => $discount_price,
                        'feature' => $feature,
                        'pro_image' => $image_name,
                    ]);
                    $products->save();
                    $product_id = $products->id;
                    $inventories = Inventories::create([
                        'product_name' => $name,
                        'product_image' => $image_name,
                        'product_id' => $product_id,
                        'import_quantity' => $import_quantity,
                        'sold_quantity' => 0,
                        'remain_quantity' => $import_quantity,
                        'inventory_status' => 'In Stocks',
                    ]);
                    $inventories->save();
                    return redirect('admin/products')->with('success', 'Add New Product Successfully!');
                } else {
                    return redirect('admin/products')->with('warning', 'Only accept image formats JPG, PNG, or WEBP!');
                }
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufactures = Manufactures::get();
        $protypes = Protypes::get();
        $probyid = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
            ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->where('id', $id)
            ->get();
        return view('admin.products.update', ['probyid' => $probyid, 'manufactures' => $manufactures, 'protypes' => $protypes, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $manu = $request->input('manu');
        $type = $request->input('type');
        $desc = $request->input('desc');
        $price = $request->input('price');
        $discount_price = $request->input('discount_price');
        $feature = $request->input('feature');
        $products = Products::find($id);

        $flashsales = FlashSales::where('product_id', '=', $id)->first();
        $current_time = Carbon::now();
        if (!is_numeric($price) || !is_numeric($discount_price)) {
            return redirect('admin/products')->with('warning', 'Price and discount price must be numeric!');
        }

        if ($flashsales && $flashsales->end_date > $current_time) {
            return redirect('admin/products')->with('error', 'This product is currently in Flash Sales season and cannot update the price!');
        }
        switch (true) {
            case empty($name):
                return redirect('admin/products')->with('error', 'Please Choose A Name!');
            case empty($manu):
                return redirect('admin/products')->with('error', 'Please Choose A Manufacture!');
            case empty($type):
                return redirect('admin/products')->with('error', 'Please Choose A Product Type!');
            case empty($desc):
                return redirect('admin/products')->with('error', 'Please Enter Description!');
            case is_null($feature):
                return redirect('admin/products')->with('error', 'Please Choose A Feature!');
            default:
                if ($request->hasFile('image')) {
                    $image = $request->file('image')->getClientOriginalName();
                    $target_dir = 'assets/img/';
                    $target_file = $target_dir . basename($image);

                    $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    if (!in_array($imgFileType, ['png', 'jpg', 'webp'])) {
                        return redirect('admin/products')->with('warning', 'Only accept image formats JPG, PNG, or WEBP!');
                    }

                    $image_name = 'image' . time() . '-' . $request->name . '.'
                        . $request->image->extension();
                    $request->image->move('assets/img', $image_name);

                    $products->update([
                        'name' => $name,
                        'manu_id' => $manu,
                        'type_id' => $type,
                        'description' => $desc,
                        'price' => $price,
                        'discount_price' => $discount_price,
                        'feature' => $feature,
                        'pro_image' => $image_name
                    ]);
                } else {
                    $products->update([
                        'name' => $name,
                        'manu_id' => $manu,
                        'type_id' => $type,
                        'description' => $desc,
                        'price' => $price,
                        'discount_price' => $discount_price,
                        'feature' => $feature
                    ]);
                }
                return redirect('admin/products')->with('success', 'Update Product Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        if ($products) {
            $flashsales = FlashSales::where('product_id', $id)->get();
            $inventories = Inventories::where("product_id", $id)->get();
            foreach ($inventories as $inventory) {
                $inventory->delete();
            }
            foreach ($flashsales as $value) {
                $value->delete();
            }
            $products->delete();
        }

        return redirect('admin/products')->with('success', 'Delete Product Successfully!');
    }

    //

    public function showByTypeid($type_id)
    {
        try {

            $from = request()->get('from');
            $to = request()->get('to');


            if (isset($_GET['sort_by'])) {
                $sort_by = $_GET['sort_by'];
                if ($sort_by == 'tang_dan') {
                    $products = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
                        ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
                        ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
                        ->where('products.type_id', $type_id)
                        ->orderBy('products.discount_price', 'asc')
                        ->paginate(6)->appends(request()->query());
                } elseif ($sort_by == 'giam_dan') {
                    $products = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
                        ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
                        ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
                        ->where('products.type_id', $type_id)
                        ->orderBy('products.discount_price', 'desc')
                        ->paginate(6)->appends(request()->query());
                } elseif ($sort_by == 'kytu_az') {
                    $products = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
                        ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
                        ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
                        ->where('products.type_id', $type_id)
                        ->orderBy('products.name', 'asc')
                        ->paginate(6)->appends(request()->query());
                } elseif ($sort_by == 'kytu_za') {
                    $products = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
                        ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
                        ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
                        ->where('products.type_id', $type_id)
                        ->orderBy('products.name', 'desc')
                        ->paginate(6)->appends(request()->query());
                }
            } elseif ($from !== null && $to !== null) {
                $products = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
                    ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
                    ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
                    ->where('products.type_id', $type_id)
                    ->whereBetween('discount_price', [$from, $to])
                    ->orderBy('products.discount_price', 'asc')
                    ->paginate(6)->appends(request()->query());
            } else {
                $products = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
                    ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
                    ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
                    ->where('products.type_id', $type_id)
                    ->orderBy('products.id', 'asc')
                    ->paginate(6);
            }

            //
            $products->each(function ($product) {
                $product->average_rating = StarRating::where('product_id', $product->id)->avg('star');
            });

            //
            $inventories = Inventories::all();
            $minDiscountPrice = Products::where('type_id', $type_id)->min('discount_price');
            $maxDiscountPrice = Products::where('type_id', $type_id)->max('discount_price');
            $type = Protypes::find($type_id);
            return view('products', ['products' => $products, 'type' => $type, 'inventories' => $inventories]);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }


    public function detailsProduct($type_id, $id)
    {
        $probyid = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
            ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->where('id', $id)
            ->first();

        $products = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
            ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->where('products.type_id', $type_id)
            ->orderBy('products.id', 'asc')
            ->paginate(4);
        $comments = Comments::where('product_id', $id)->orderBy('comm_id', 'DESC')->paginate(10);
        $allcomment = Comments::all();

        $star = StarRating::where(['product_id' => $id, 'user_id' => auth()->id()])->first();
        $allRatings = StarRating::where('product_id', $id)->get();
        $inventories = Inventories::select('inventories.*')->where('product_id', $id)->first();

        // foreach ($inventories as $remain_quantity)
        $list_inven = Inventories::all();

        return view('detail-product', [
            'products' => $products,
            'probyid' => $probyid,
            'comments' => $comments,
            'starRating' => $star,
            'allRatings' => $allRatings,
            'inventories' => $inventories,
            'inven' => $list_inven,
            'allcomment' => $allcomment
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $type_id = $request->input('searchCol');

        if($type_id == 4){
            $list_order = Orders::select('orders.*', 'users.Last_name as name')
            ->join('users', 'orders.user_id', '=', 'users.user_id')
            ->where('orders.order_code', $keyword)
            ->orderBy('orders.order_id', 'desc')
            ->paginate(6);
            $status = Status::get();
        

            if ($list_order) {
                // Nếu đơn hàng tồn tại, bạn có thể thực hiện các xử lý khác ở đây nếu cần
                return view('list-order', ['listorder' => $list_order, 'status' => $status]);
            }
            else{
                return redirect()->back()->with('error', 'Không tìm thấy đơn hàng này');
            }
        }

        $query = Products::query();

        $query->where('name', 'like', "%$keyword%");
        if ($type_id && $type_id != 0) {
            $query->where('type_id', $type_id);
        }

        $products = $query->paginate(6)->appends(request()->query());
        $products->each(function ($product) {
            $product->average_rating = StarRating::where('product_id', $product->id)->avg('star');
        });
        $count_product = $query->count();
        $inventories = Inventories::all();
        return view('search-products', [
            'products' => $products,
            'count_product' => $count_product,
            'inventories' => $inventories
        ]);
    }
    public function searchProductAdmin(Request $request)
    {
        $keyword = $request->input('keyword');
        $type_id = $request->input('searchCol');
        $productAll = Products::all();
        $query = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
            ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->orderBy('products.id', 'desc');

        if (!empty($keyword)) {
            $query->where('name', 'like', "%$keyword%");
        }

        if (!empty($type_id) && $type_id != 0) {
            $query->where('products.type_id', $type_id);
        }

        $products = $query->paginate(10)->appends(request()->query());

        return view('admin.products.index', ['products' => $products, 'productAll' => $productAll]);
    }

    //Comments

    // public function editComment($comm_id)
    // {
    //     $data = request()->all('comment');
    // }

    //Favorites
    public function favorite($proid)
    {
        $data = [
            'product_id' => $proid,
            'user_id' => auth()->id()
        ];
        $star = Favorites::where(['product_id' => $proid, 'user_id' => auth()->id()])->first();
        if ($star) {
            $star->delete();
            return redirect()->back()->with('error', 'Bạn đã bỏ yêu thích sản phẩm');
        } else {
            Favorites::create($data);
            return redirect()->back()->with('success', 'Bạn đã yêu thích sản phẩm');
        }

    }

    public function favoriteShow()
    {

        $inventories = Inventories::all();
        $favorites = auth()->user()->favorites()->paginate(6);
        $count = Favorites::where(['user_id' => auth()->id()])->count();
        return view('favorites', compact('favorites', 'count'), ['inventories' => $inventories]);
    }
}