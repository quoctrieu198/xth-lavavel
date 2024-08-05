@extends('admin.layout.master')

@section('title')
Danh sách hóa đơn
@endsection

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('style-libs')
<link href="{{ asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    .bg-status-pending { background-color: #f0ad4e; color: #000; }
    .bg-status-confirmed { background-color: #5bc0de; color: #fff; }
    .bg-status-preparing { background-color: #d9534f; color: #fff; }
    .bg-status-shipping { background-color: #f7e7d2; color: #000; }
    .bg-status-delivered { background-color: #5cb85c; color: #fff; }
    .bg-status-cancel { background-color: #d9534f; color: #fff; }
    .bg-payment-paid { background-color: #5bc0de; color: #fff; }
    .bg-payment-unpaid { background-color: #f0ad4e; color: #000; }
</style>
@endsection

@section('script-libs')
<script src="{{ asset('theme/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('theme/admin/js/demo/datatables-demo.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('select[name="order_status"]').forEach(function(select) {
            select.addEventListener('change', function() {
                const statusClasses = {
                    'pending': 'bg-status-pending',
                    'confirmed': 'bg-status-confirmed',
                    'preparing': 'bg-status-preparing',
                    'shipping': 'bg-status-shipping',
                    'delivered': 'bg-status-delivered',
                    'cancel': 'bg-status-cancel'
                };

                select.className = 'custom-select ' + (statusClasses[this.value] || 'bg-warning');
            });
        });

        document.querySelectorAll('select[name="payment_status"]').forEach(function(select) {
            select.addEventListener('change', function() {
                const paymentClasses = {
                    'paid': 'bg-payment-paid',
                    'unpaid': 'bg-payment-unpaid'
                };

                select.className = 'custom-select ' + (paymentClasses[this.value] || 'bg-warning');
            });
        });
    });
</script>
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách hóa đơn</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Khách Hàng</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Khách Hàng</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user_email }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->user_phone }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <form action="{{ route('admin.order.updateStatus', $order->id) }}" method="POST" style="display: inline;">
                                     @csrf
                                    @method('PUT')
                                        <select name="order_status" class="custom-select" onchange="this.form.submit()">
                                            @foreach(\App\Models\Order::ORDER_STATUS as $key => $status)
                                                @php
                                                    $isDisabled = !$loop->first && $order->order_status !== 'pending' && $order->order_status === $key;
                                                @endphp
                                                <option value="{{ $key }}" {{ $isDisabled ? 'disabled' : '' }} {{ $order->order_status === $key ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.order.updatePaymentStatus', $order->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <select name="payment_status" class="custom-select" onchange="this.form.submit()">
                                            @foreach(\App\Models\Order::PAYMENT_STATUS as $key => $status)
                                                @if(!$loop->first && $order->payment_status === $key && $order->payment_status !== 'unpaid')
                                                    <option value="{{ $key }}" disabled>
                                                        {{ $status }}
                                                    </option>
                                                @else
                                                    <option value="{{ $key }}" {{ $order->payment_status === $key ? 'selected' : '' }}>
                                                        {{ $status }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                                <td>{{ number_format($order->total_price, 2) }}</td>
                                <td>
                                    <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-success">Xem chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
