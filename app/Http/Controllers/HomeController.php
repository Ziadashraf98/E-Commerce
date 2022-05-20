<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if($usertype == 1)
        {
            return view('admin.home');
        }
        else
        {
            $data = Product::paginate(3);
            $user = Auth::user();
            $count = Cart::where('phone' , $user->phone)->count();
            return view('user.home' , compact('data','count'));
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = Product::paginate(3);
            return view('user.home' , compact('data'));
        }
    }
    
    public function search(Request $request)
    {
        $search = $request->search;
        
        if($search == null)
        {
            $data = Product::paginate(3);
            return view('user.home' , compact('data'));
        }
        
        $data = Product::where('title' , $search)->get();
        return view('user.home' , compact('data'));
        
    }

    public function addcart(Request $request , $id)
    {
        if(Auth::id())
        {
            $user =  Auth::user();
            $product = Product::find($id);
            $cart = new Cart;  
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->save();
            return back()->with('success' , 'Product Added Successfully');


        }
        else
        {
            return redirect('register');
        }
        
    }

    public function showcart()
    {
        $user = Auth::user()->phone;
        $count = Cart::where('phone' , $user)->count();
        $cart = Cart::where('phone' , $user)->get();
        return view('user.showcart' , compact('cart','count'));
    }

    public function deletecart($id)
    {
        // $cart->find($id)->delete();
        $cart = Cart::find($id);
        $cart->delete();
        return back()->with('success' , 'Product Deleted Successfully');
    }

    public function confirmorder(Request $request)
    {
        foreach($request->price as $key=>$z)
        {
            
            $user = Auth::user();
            $order = new Order;
            $order->name = $user->name;
            $order->phone = $user->phone;
            $order->address = $user->address;
            $order->product_name = $request->product_name[$key];
            $order->quantity = $request->quantity[$key];
            $order->price = $request->price[$key];
            $order->status = 'not delivered';
            $order->save();
        }
        
        DB::table('carts')->where('phone' , $user->phone)->delete();
        return back()->with('success' , 'Product Ordered Successfully');
    }

}
