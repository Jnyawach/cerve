<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CheckoutRequest $request)
    {
        //


        if ($request->shipping==1){

            $shipping = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'Shipping',
                'type' => 'shipping',
                'target' => 'subtotal',
                'order' => 1,
                'value' => +0,
            ));
            \Cart::session(Auth::id())->condition($shipping);

        }elseif ($request->shipping==2){
            $shipping = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'Shipping',
                'type' => 'shipping',
                'target' => 'subtotal',
                'order' => 1,
                'value' => +0,
            ));
            \Cart::session(Auth::id())->condition($shipping);

        }else{
            Session::flash('checkout_message', 'Please select a valid shipping Method');
            return redirect()->back();
        }

        if($request->payment==1){
            return view('account.checkout.index');
        }elseif($request->payment==2){
            return view('account/checkout/transfer');
        }

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
