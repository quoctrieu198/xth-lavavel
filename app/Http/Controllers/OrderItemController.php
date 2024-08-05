<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    //
    const PATH_VIEW = 'admin.order.';

    public function show(Order $order){
        $orderItems = OrderItem::where('order_id', $order->id)->get();
        return view(self::PATH_VIEW . 'show', compact('order', 'orderItems'));
    }
}
