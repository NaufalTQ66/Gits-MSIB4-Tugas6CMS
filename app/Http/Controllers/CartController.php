<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
	public function index()
	{
		$data['title'] = 'NFL Shop';
		$data['products'] = Product::with('category')->get();

		return view('home', $data);
	}

	public function dcart($id)
	{
		$data['title'] = 'Cart Detail';
		$data['products'] = Product::find($id);

		return view('detail', $data);
	}

	public function pesan(Request $request, $id)
	{
		$product = Product::where('id', $id)->first();

		if ($request->jumlah_pesan > $product->stok) {
			return redirect('pesan/' . $id);
		}

		$cek_cart = Cart::where('user_id', Auth::user()->id)->where('status', 0)->first();

		if (empty($cek_cart)) {
			$cart = new Cart;
			$cart->user_id = Auth::user()->id;
			$cart->status = 0;
			$cart->total_price = 0;
			$cart->kode = mt_rand(100, 999);
			$cart->save();
		}

		$new_cart = Cart::where('user_id', Auth::user()->id)->where('status', 0)->first();

		$cek_cart_detail = CartDetail::where('product_id', $product->id)->where('cart_id', $new_cart->id)->first();
		if (empty($cek_cart_detail)) {
			$cart_detail = new CartDetail;
			$cart_detail->product_id = $product->id;
			$cart_detail->cart_id = $new_cart->id;
			$cart_detail->jumlah = $request->jumlah_pesan;
			$cart_detail->total_price = $product->price * $request->jumlah_pesan;
			$cart_detail->save();
		} else {
			$cart_detail = CartDetail::where('product_id', $product->id)->where('cart_id', $new_cart->id)->first();
			$cart_detail->jumlah = $cart_detail->jumlah + $request->jumlah_pesan;
			$harga_cart_detail_baru = $product->price * $request->jumlah_pesan;
			$cart_detail->total_price = $cart_detail->total_price + $harga_cart_detail_baru;
			$cart_detail->update();
		}

		$cart = Cart::where('user_id', Auth::user()->id)->where('status', 0)->first();
		$cart->total_price = $cart->total_price + $product->price * $request->jumlah_pesan;
		$cart->update();

		return redirect('/');
	}

	public function check_out()
	{
		$title = 'Cart';
		$cart = Cart::where('user_id', Auth::user()->id)->where('status', 0)->first();
		$cart_details = [];
		if (!empty($cart)) {
			$cart_details = CartDetail::where('cart_id', $cart->id)->get();
		}

		return view('cart.check_out', compact('cart', 'cart_details', 'title'));
	}

	public function delete($id)
	{
		CartDetail::destroy($id);

		return redirect('/');
	}
}
