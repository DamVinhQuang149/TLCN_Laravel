<?php

namespace App\Http\Controllers;
use App\Models\Comments;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use App\Models\StarRating;
use App\Models\Users;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comments::select('comments.*', 'products.name as name', 'products.pro_image as pro_img', 'users.Last_name as Last_name', 'users.First_name as First_name')
                    ->join('products', 'comments.product_id', '=', 'products.id')
                    ->join('users', 'comments.user_id', '=', 'users.user_id')
                    ->orderBy('comments.comm_id', 'desc')
                    ->paginate(10);
        $allcomment = Comments::all();
        return view('admin.comments.index', ['comments' => $comments, 'allcomment' => $allcomment]);
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
        //
        // $comment = Comments::find($id);

        $comment = Comments::select('Comments.*', 'products.name', 'products.id', 'products.pro_image', 'users.Last_name', 'users.First_name')
                    ->where('comm_id', $id)
                    ->join('products', 'comments.product_id', '=', 'products.id')
                    ->join('users', 'comments.user_id', '=', 'users.user_id')
                    ->orderBy('comments.comm_id', 'desc')
                    ->paginate(10);
        if($comment){
            return view('admin.comments.update', ['comment' => $comment]);
        }

        
        return redirect('admin/comments')->with('error', 'Comments are currently unavailable');

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
        //
        $status = $request->input('status');
        $product_id = $request->input('product_id');
        $comment = $request->input('reply-comment');
        $user_id = auth()->id();
        $reply_to_comment_id = $id;
        $comments = Comments::find($id);

        if($status === null){
            return redirect()->back()->with('error', 'Status is required.');
        }
        else  if($comment === null){
            return redirect()->back()->with('error', 'reply to comment is required.');
        }else {
            $comments->update([
                'isApproved' => $status
            ]);
            Comments::create([
                'product_id' => $product_id,
                'comment' => $comment,
                'user_id' => $user_id,
                'reply_to_comment_id' => $reply_to_comment_id
            ]);
            
            return redirect('admin/comments')->with('success', 'Update Comment Successfully!');
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
        //
        $comment = Comments::find($id);
        if($comment){
            $comment->delete();
            $comment_user = Comments::where(['product_id' => $comment->product_id, 'user_id' => $comment->user_id])->first();

            
            $comments = Comments::where('product_id', $comment->product_id)->orderBy('comm_id', 'DESC')->paginate(4);
            $star = StarRating::where(['product_id' => $comment->product_id, 'user_id' => $comment->user_id])->first();
            if($comment_user == null){
                $star->delete();
            }
            return redirect('admin/comments')->with('success', 'Delete Comment Successfully!');
        }
        return redirect('admin/comments')->with('error', 'Comments are currently unavailable');
    }
    public function commentPost($proid, $comment, $star)
    {
        $data['product_id'] = $proid;
        $data['comment'] = $comment;
        $data['user_id'] = auth()->id();
        $data['star'] = $star;

        $dataStart['product_id'] = $proid;
        $dataStart['star'] = $star;
        $dataStart['user_id'] = auth()->id();

        $userOrders = Orders::Where('user_id', auth()->id())->get();
        $count = 0;
        $orderDetails = [];
        if($userOrders){
            foreach ($userOrders as $userOrder) {
                $orderDetail = OrderDetails::select('product_id')
    
                    ->where('order_id', $userOrder->order_id)
    
                    ->get();
    
                $orderDetails[] = $orderDetail;
            }
            
            foreach ($orderDetails as $value) {
                foreach ($value as $orderDetail) {
                    if ($orderDetail->product_id == $proid) {
                        $count = $count + 1;
                    }
                }
            }
        }        

        $existingStar = StarRating::where(['product_id' => $proid, 'user_id' => auth()->id()])->first();
        if ($count > 0) {
            if ($existingStar) {
                $existingStar->update($dataStart);
                Comments::create($data);

                $comments = Comments::where('product_id', $proid)->orderBy('comm_id', 'DESC')->paginate(4);

                return response()->json([
                    'status' => 'success',
                    'comment_view' => view('ajax.ajax_comment', ['comments' => $comments])->render(),
                ]);
            } else {
                StarRating::create($dataStart);
                Comments::create($data);

                $comments = Comments::where('product_id', $proid)->orderBy('comm_id', 'DESC')->paginate(4);

                return response()->json([
                    'status' => 'success',
                    'comment_view' => view('ajax.ajax_comment', ['comments' => $comments])->render(),
                ]);
            }
        } else {
            $comments = null;
            return response()->json([
                'status' => 'error',
                'message' => 'Bạn chưa đặt sản phẩm này. Vui lòng đặt hàng trước khi đánh giá sản phẩm!'
            ]);
        }
    }
    public function deleteComment($comm_id)
    {
        //dd($comm_id);

        $comment = Comments::find($comm_id);
        if($comment){
            $comment->delete();
            $comment_user = Comments::where(['product_id' => $comment->product_id, 'user_id' => auth()->id()])->first();

            
            $comments = Comments::where('product_id', $comment->product_id)->orderBy('comm_id', 'DESC')->paginate(4);

            $star = StarRating::where(['product_id' => $comment->product_id, 'user_id' => auth()->id()])->first();
            if($comment_user == null){
                $star->delete();
            }
            return response()->json([
                'status' => 'success',
                'comment_view' => view('ajax/ajax_comment', ['comments' => $comments])->render(),
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Bình luận này không tồn tại!'
        ]);
        
    }

    public function isApproveComm(Request $request, $id){
        //dd($request->input('isApproved'));
        $comment = Comments::find($id);
        if ($comment) {
            $comment->isApproved = $request->input('isApproved');
            $comment->save();
            return redirect('admin/comments')->with('success', 'Action Successfully!');
        } else {
            return redirect('admin/comments')->with('error', 'Action Failed!');

        }
    }
}