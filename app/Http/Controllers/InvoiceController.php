<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderDetails;
use PDF;

class InvoiceController extends Controller
{
    public function generateInvoice($order_id)
    {
        $order = Orders::select('orders.*', 'users.First_name', 'users.Last_name')
            ->join('users', 'orders.user_id', '=', 'users.user_id')
            ->where('orders.order_id', $order_id)
            ->first();
        $order_details = OrderDetails::select('order_details.*', 'products.*', 'protypes.*')

            ->join('products', 'order_details.product_id', '=', 'products.id')

            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')

            ->where('order_id', $order_id)

            ->get();
        if (!$order) {
            abort(404, 'Đơn hàng không tồn tại');
        }

        $pdf = PDF::loadView('invoices.index', compact('order', 'order_details'));

        return $pdf->stream('invoice.pdf');
    }
}