<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\User;
use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CheckOut;

class CheckoutController extends Controller
{
    public function index() {
        $data = [];

        if (!session()->has('cart')) {
            return view('shop.shopping-cart');
        }

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $user = User::find(auth()->id());
        $data = [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice,
            'user' => $user
        ];

        return view('shop.checkout', $data);
    }

    public function store(CheckOut $request) {
        $validation = $request->validation;
         $data = $request->only([
            'address_shipping',
            'description',
            'phone_number'
        ]);
        try {
            $cart = session()->get('cart');
            $data['user_id'] = auth()->id();
            $data['total_price'] = $cart->totalPrice;
            $data['status'] = config('order.pending');
            $order = Order::create($data);
            $products = $cart->items;
            $orderProducts = [];

            foreach ($products as $product) {
                $orderProducts[] = [
                    'order_id' => $order->id,
                    'product_id' => $product['item']->id,
                    'quantity' => $product['quantity'],
                    'price' => $product['price']
                ];
            }

            try {
                OrderProduct::insert($orderProducts);
                session()->forget('cart');
                return redirect()->route('home')->with('success', __('checkout.create_success'));
            }catch (\Exception $e) {
                $order->delete();
                return back()->with('error', __('checkout.create_fail'));
            }

        }catch (\Exception $e) {
            return back()->with('error', __('checkout.create_fail'));
        }
    }
}
