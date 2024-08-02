<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    const PATH_VIEW = 'admin.order.';
    public function index()
    {
        $data = Order::query()->latest('created_at')->get();
        // Logic để hiển thị danh sách đơn hàng
        return view(self::PATH_VIEW. __FUNCTION__,compact('data'));
    }

    public function add(Request $request)
    {
//        dd($request->all());
        try {
            //Check tai khoan dang nhap
            $order = Order::query()->create([
                'user_id' =>$request->userId,
                'user_email'=>$request->user_email,
                'user_name'=>$request->user_name,
                'user_address'=>$request->user_address,
                'user_phone'=>$request->user_phone,
                'receiver_email'=>$request->receiver_email,
                'receiver_name'=>$request->receiver_name,
                'receiver_address'=>$request->receiver_address,
                'receiver_phone'=>$request->receiver_phone,
                'total_price'=>$request->totalAmount,
            ]);
            // tao ban ghi oderitem
            foreach (json_decode($request->productVariants) as $item){
                $item->order_id = $order->id;
                OrderItem::query()->create((array) $item);

                // Xoa san pham da mua trong gio hang
                CartItem::query()->join('carts', 'carts.id', '=', 'cart_items.cart_id')
                    ->where(['product_variant_id' => $item->product_variant_id, 'cart_items.cart_id' => $request->userId])->delete();
            }

            return redirect()->route('home.index')->with('success' ,'Đặt hàng thành công');
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }
}
