<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Produk; 

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $cart = Session::get('cart', []);
        $quantity = $request->quantity ?? 1;

        // Retrieve product details from the database
        $product = Produk::find($productId);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        // Add or update the product quantity in the cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'name' => $product->nama_produk,
                'price' => $product->harga_produk,
                'quantity' => $quantity
            ];
        }

        Session::put('cart', $cart);

        return response()->json(['success' => true]);
    }


    

    public function removeFromCart($productId)
    {
        // Retrieve the cart from the session
        $cart = Session::get('cart', []);

        // If the product is in the cart, remove it
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }

        return response()->json(['success' => true]);
    }

    public function updateCart(Request $request, $productId)
    {
        // Validate the request
        $quantity = $request->quantity ?? 0;
        if ($quantity < 0) {
            return response()->json(['success' => false, 'message' => 'Invalid quantity'], 400);
        }

        // Retrieve the cart from the session
        $cart = Session::get('cart', []);

        // If the product is in the cart, update the quantity
        if (isset($cart[$productId])) {
            if ($quantity > 0) {
                $cart[$productId]['quantity'] = $quantity;
            } else {
                unset($cart[$productId]); // Remove the item if the quantity is zero
            }
            Session::put('cart', $cart);
        }

        return response()->json(['success' => true]);
    }

    public function showCart()
    {
        // Retrieve the cart from the session
        $cart = Session::get('cart', []);

        // Here you should join with product details from the database, if needed
        return view('cart.show', compact('cart'));
    }

    // Add any additional methods you need for cart management
}
