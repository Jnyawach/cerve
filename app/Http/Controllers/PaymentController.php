<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('account.payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cart=\Cart::session(Auth::id())->getContent();
        $cartReady=json_encode($cart);
        $order=Order::create([
            'user_id'=>Auth::id(),
            'cart_data'=>$cartReady,
            'amount'=>$request->amount
        ]);

        $input=array(
            'order_id'=>$order->id,
            'total'=>$cart->getTotal(),
            'shipping'=>0.00,
            'tax'=>0.00,
            'cart'=>$cart



        );

        Mail::send('mail.receipt', $input, function ($message) use($input){
            $message->to(Auth::user()->email);
            $message->from('cerve@cervekenya.com');
            $message->subject('Order Confirmation');

        });
        \Cart::session(Auth::id())->clear();

        return redirect('account/homepage/payment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
