<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $order = Order::create([
            'customer_id' => 1, // data dummy bahwa customer adalah 1 (budi)
            'total_harga' => $request->total_harga
        ]);

        foreach ($request->product_id as $key => $productId) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'qty' => $request->qty[$key],
                'harga' => $request->harga[$key]
            ]);
        }

        return redirect()->route('orders.create')->with('success', 'Order berhasil dilakukan.');
    }

    public function show(Order $order)
    {
        $order->load('customer', 'orderItems');

        return view('orders.show', compact('order'));
    }

    public function getOrders(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::with('customer', 'orderItems.product')->select('orders.*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('customer_name', function ($row) {
                    return $row->customer->nama;
                })
                ->addColumn('total_items', function ($row) {
                    return $row->orderItems->sum('qty');
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('orders.show', $row->id) . '" class="btn btn-primary btn-sm">View</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return abort(404);
    }
}
