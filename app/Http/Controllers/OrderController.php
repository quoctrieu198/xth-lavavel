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
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    public function add(Request $request)
    {
        //        dd($request->all());
        try {
            //Check tai khoan dang nhap
            $order = Order::query()->create([
                'user_id' => $request->userId,
                'user_email' => $request->user_email,
                'user_name' => $request->user_name,
                'user_address' => $request->user_address,
                'user_phone' => $request->user_phone,
                'receiver_email' => $request->receiver_email,
                'receiver_name' => $request->receiver_name,
                'receiver_address' => $request->receiver_address,
                'receiver_phone' => $request->receiver_phone,
                'total_price' => $request->totalAmount,
            ]);
            // tao ban ghi oderitem
            foreach (json_decode($request->productVariants) as $item) {
                $item->order_id = $order->id;
                OrderItem::query()->create((array) $item);

                // Xoa san pham da mua trong gio hang
                CartItem::query()->join('carts', 'carts.id', '=', 'cart_items.cart_id')
                    ->where(['product_variant_id' => $item->product_variant_id, 'cart_items.cart_id' => $request->userId])->delete();
            }

            return redirect()->route('home.index')->with('success', 'Đặt hàng thành công');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
    public function show(Order $order)
    {
        return view(self::PATH_VIEW . 'show', compact('order'));
    }
    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'order_status' => 'required|in:pending,confirmed,preparing,shipping,delivered,cancel'
        ]);

        // Lấy trạng thái hiện tại và trạng thái mới
        $currentStatus = $order->order_status;
        $newStatus = $request->input('order_status');

        // Danh sách các trạng thái không thể quay lại trạng thái cũ
        $closedStatuses = ['delivered', 'cancel'];

        // Nếu trạng thái mới bằng trạng thái hiện tại
        if ($currentStatus === $newStatus) {
            return redirect()->route('admin.order.index')->with('error', 'Trạng thái đơn hàng đã ở trạng thái này.');
        }

        // Nếu trạng thái hiện tại là trạng thái đóng và trạng thái mới không phải là trạng thái tiếp theo hợp lệ
        if (in_array($currentStatus, $closedStatuses)) {
            return redirect()->route('admin.order.index')->with('error', 'Không thể cập nhật trạng thái của đơn hàng đã được đóng.');
        }

        // Cập nhật trạng thái đơn hàng
        $order->update(['order_status' => $newStatus]);

        return redirect()->route('admin.order.index')->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }



    // Phương thức cập nhật trạng thái thanh toán
    public function updatePaymentStatus(Request $request, Order $order)
    {
        $request->validate([
            'payment_status' => 'required|in:paid,unpaid'
        ]);

        // Lấy trạng thái hiện tại và trạng thái mới
        $currentPaymentStatus = $order->payment_status;
        $newPaymentStatus = $request->input('payment_status');

        // Nếu trạng thái mới bằng trạng thái hiện tại hoặc trạng thái cũ đã được đóng
        if ($currentPaymentStatus === $newPaymentStatus || $this->isPaymentStatusClosed($currentPaymentStatus)) {
            return redirect()->route('admin.order.index')->with('error', 'Không thể cập nhật về trạng thái thanh toán cũ hoặc trạng thái đã được đóng.');
        }

        // Cập nhật trạng thái thanh toán
        $order->update(['payment_status' => $newPaymentStatus]);

        return redirect()->route('admin.order.index')->with('success', 'Trạng thái thanh toán đã được cập nhật.');
    }

    // Kiểm tra trạng thái đơn hàng có phải là trạng thái đóng không
    private function isStatusClosed($status)
    {
        // Danh sách các trạng thái đóng
        $closedStatuses = ['delivered', 'cancel'];

        return in_array($status, $closedStatuses);
    }

    // Kiểm tra trạng thái thanh toán có phải là trạng thái đóng không
    private function isPaymentStatusClosed($status)
    {
        // Danh sách các trạng thái thanh toán đóng
        $closedPaymentStatuses = ['paid'];

        return in_array($status, $closedPaymentStatuses);
    }

    public function printInvoma($id)
{
    $order = Order::with('items')->findOrFail($id); // Load thông tin đơn hàng cùng với sản phẩm
    return view('admin.order.print', ['order' => $order]);
}


}
