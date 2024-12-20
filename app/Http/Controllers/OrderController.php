<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(Request $request) {
        $cart = Cart::with('items')->where('user_id', auth()->id())->firstOrFail();
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $cart->items->sum(fn($item) => $item->quantity * $item->price),
            'status' => 'Pending',
            'shipping_address_id' => $request->shipping_address_id,
        ]);
    
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }
    
        $cart->items()->delete();
        $cart->delete();
    
        return response()->json($order, 201);
    }
    
}
