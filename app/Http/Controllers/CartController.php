<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
        $cartItem = CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
        return response()->json($cartItem, 201);
    }

    public function updateItem(Request $request, $id) {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->update($request->all());
        return response()->json($cartItem, 200);
    }
    
    public function deleteItem($id) {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();
        return response()->json(null, 204);
    }
    
}
