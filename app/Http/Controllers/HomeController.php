<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use Symfony\Component\CssSelector\Node\FunctionNode;
use App\Models\Order;
use App\Models\Cart;

class HomeController extends Controller
{

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $data = product::paginate(3);
            $user = auth()->user();
            $count = cart::where('phone', $user->phone)->count();
            return view('user.home', compact('data', 'count'));
        }
    }

    public function index()
    {

        if (Auth::id()) {
            return redirect('redirect');
        } else {

            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $data = product::paginate(3);
            $user = auth()->user();
            return view('user.home', compact('data'));
        }
        $data = product::where('title', 'like', '%' . $search . '%')->get();
        return view('user.home', compact('data'));
    }

    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = auth()->user();

            $product = product::find($id);
            $cart = new cart;
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address  = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;

            $cart->save();
            return redirect()->back()->with('message', 'Thêm vào giỏ hàng thành công!!');
        } else {
            return redirect('login');
        }
    }

    public function showcart()
    {
        $user = auth()->user();
        $cart = cart::where('phone', $user->phone)->get();
        $count = cart::where('phone', $user->phone)->count();
        return view('user.showcart', compact('count', 'cart'));
    }

    public function deletecart($id)
    {
        $data = cart::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Xóa mặt hàng thành công!');
    }

    public function confirmorder(Request $request)
    {
        $user = auth()->user();

        $name = $user->name;
        $phone = $user->phone;
        $address = $user->address;

        foreach ($request->productname as $key => $productname) {
            $order = new order;

            $order->product_name = $request->productname[$key];
            $order->price = $request->price[$key];
            $order->quantity = $request->quantity[$key];
            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->save();
        }
        return redirect()->back()->with('message', 'Đặt hàng thành công!');
    }
}
