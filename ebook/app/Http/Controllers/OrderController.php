<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Users;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.checkout');
    }
    public function showorderdetalis()
{
    $orders = Order::with(['user', 'book'])->select('name','email','address' ,'user_id', 'product_id', 'product_quantity','product_price')->get();
    return view('admin.order', compact('orders'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.checkout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeorder(Request $request)
    {
            $user = Auth::user();
            $userid = $user->id;
            $username = $user->name;
            $email = $user->email;
            // dd($username);die();

            $data = Cart::where('user_id','=',$userid)->get();
          
            foreach($data as $data)
            {
                $order = new Order;
                $order->name = $username;
                $order->email = $email;
                $order->address = $request->address;
                $order->user_id = $userid;
                $order->product_quantity = $data->qty;
                $order->product_price = $data->price;
                $order->product_id = $data->bookid;
                $order->payment_status = 'cash on delivery';
                $order->delivery_status = 'pending';
                $order->save();
                $cart =$data->id;
                $carts = Cart::find($cart);
    
                $carts->delete();
    
            }
            return redirect()->back()->with('msg',"Order has been placed");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    
        return view('user.download');
    }
    



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function active($id)
    {
        $orders = Order::find($id);
        $orders->status = 1;
        $orders->update();
        return redirect()->route('admin.order');
    }
    public function deactive($id)
    {
        $orders = Order::find($id);
        $orders->status = 0;
        $orders->update();
        return redirect()->route('showcat');
    }
}
