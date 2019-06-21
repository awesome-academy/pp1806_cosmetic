<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductController extends Controller
{
    public function getAddToCart($id) {
        $product = Product::find($id);
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        session()->put('cart', $cart);

        return redirect()->back()->with('status', __('cart.add_success'));
    }

    public function getCart() {
        $data = [];

        if (session()->has('cart')) {
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $data = ['products' => $cart->items, 'totalPrice' => $cart->totalPrice];
        }

        return view('shop.shopping-cart', $data);
    }

    public function deleteCartAll() {
        if (session()->has('cart')) {
            session()->forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }

    public function deleteCartItem($id) {
        if (session()->has('cart')) {
            $oldCart = session()->get('cart');
            $cart = new Cart($oldCart);
            $product = Product::find($id);

            if ($cart->deleteCartItem($product, $id)) {
                session()->put('cart', $cart);
                $newCart = session()->get('cart');                
                $items = $newCart->items;
                if (empty($items)) {
                    session()->forget('cart');
                    $result = [
                        'status' => true,
                        'itemEmpty' => true,
                        'message' => __('cart.delete_success')
                    ];
                } else {
                    $itemPrice = $newCart->items[$id]['price'];
                    $totalPrice = $newCart->totalPrice;
                    $result = [
                        'status' => true,
                        'itemEmpty' => false,
                        'message' => __('cart.delete_success'),
                        'itemPrice' => $itemPrice,
                        'totalPrice' => $totalPrice
                    ];
                }
            } else {
                    $result = [
                        'status' => false,
                        'message' => __('cart.not_found')
                    ];
                }
            
        } else {
            $result = [
                        'status' => false,
                        'message' => __('cart.delete_fail')
                    ];
        }

        return response()->json($result);
    }

    public function upCartQty($id) {
        if (session()->has('cart')) {
            $product = Product::find($id);
            $oldCart = session()->get('cart');
            $cart = new Cart($oldCart);
            if ($cart->upQuantity($product, $product->id)) {
                session()->put('cart', $cart);
                $newCart = session()->get('cart');
                $itemPrice = $newCart->items[$id]['price'];
                $totalPrice = $newCart->totalPrice;
                $result = [
                        'status' => true,
                        'message' => __('cart.updated'),
                        'itemPrice' => $itemPrice,
                        'totalPrice' => $totalPrice
                    ];
            } else {
                $result = [
                    'status' => false,
                    'message' => __('cart.not_found')
                ];
            }
        } else {
            $result = [
                        'status' => false,
                        'message' => __('cart.update_fail')
                    ];
        }

        return response()->json($result);
    }

    public function downCartQty($id) {
        if (session()->has('cart')) {
            $product = Product::find($id);
            $oldCart = session()->get('cart');
            $cart = new Cart($oldCart);
            if ($cart->downQuantity($product, $product->id)) {
                session()->put('cart', $cart);
                $newCart = session()->get('cart');
                $itemPrice = $newCart->items[$id]['price'];
                $totalPrice = $newCart->totalPrice;
                $result = [
                        'status' => true,
                        'message' => __('cart.updated'),
                        'itemPrice' => $itemPrice,
                        'totalPrice' => $totalPrice
                    ];
            } else {
                $result = [
                    'status' => false,
                    'message' => __('cart.not_found')
                ];
            }
        } else {
            $result = [
                        'status' => false,
                        'message' => __('cart.update_fail')
                    ];
        }

        return response()->json($result);
    }

    public function show($id) {
        $product = Product::find($id);
        $recommendPros = Product::where('brand_id', $product->brand_id)->get();
        $data = [];

        if (!$product) {
            return back()->with('status', __('products.not_found'));
        }
        
        $imageLists = explode(',', $product->image_list);
        $data = ['product' => $product, 'recommendPros' => $recommendPros, 'imageLists' => $imageLists];

        return view('product.show', $data);
    }
}
