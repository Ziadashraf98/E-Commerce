<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == 1)
            {
                return view('admin.product');
            }
            else
            {
                return back();
            }
            return view('admin.product');
        }
        else
        {
            return redirect('register');
        }
    }
    
    
    public function uploadproduct(Request $request)
    {
          $data = Product::create($request->all());
          $data->image = time() .'.'. $data->image->getClientOriginalExtension();
          $request->image->move('productimage' , $data->image);
          $data->save();
          return back()->with('success' , 'Product Added Successfully');
    }

    public function showproduct()
    {
        $data = Product::all();
        return view('admin.showproduct' , compact('data'));
    }

    public function deleteproduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success' , 'Product Deleted Successfully');
    }

    public function updateview($id , Request $request)
    {
        $product = Product::find($id);
        return view('admin.updateview' , compact('product'));

    }

    public function updateproduct($id , Request $request)
    {
        $data = Product::find($id);
        $data->update($request->all());
        
        if($request->image)
        {
            $data->image = time() .'.'. $data->image->getClientOriginalExtension();
            $request->image->move('productimage' , $data->image);
            $data->save();
        }
        
        return back()->with('success' , 'Product Updated Successfully');
    }

    public function showorder()
    {
        $order = Order::all();
        return view('admin.showorder' , compact('order'));
    }

    public function updatestatus($id)
    {
        $order = Order::find($id);
        $order->status = 'delivered';
        $order->save();
        return back();
    }

}
