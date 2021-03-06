<?php

namespace App\Http\Controllers;

use App\Http\Requests\MpesaSTKPushSimulateRequest;
use App\Mpesa;
use App\MpesaC2B;
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

        /**
         * This the controller which should process the payment
         * I need to initiate the stk push, confirm the response and return the id after it
         *been inserted into the table so that I can relate it to the orders table
         *
         */
        if (\Cart::session(Auth::id())->getContent()->count()>0){

            $payment=MpesaC2B::where('trans_id', $request->reference)->first();
            if($payment){
               if($payment->invoice_number){
                  return redirect()->back()->with('message', 'Sorry Outdated Transaction Code');
               }else{
                   if($payment->trans_amount<$request->amount){
                       return redirect()->back()->with('message', 'Sorry amount paid not equivalent to subtotal. Email: support@cervekenya.com');
                   }elseif ($payment->trans_amount>$request->amount){
                       return redirect()->back()->with('message', 'Sorry amount paid not exceeds the subtotal. Email: support@cervekenya.com');
                   }else{
                       if($payment->trans_amount==$request->amount){


                       $cart=\Cart::session(Auth::id())->getContent();
                       $cartReady=json_encode($cart);
                       $order=Order::create([
                           'user_id'=>Auth::id(),
                           'cart_data'=>$cartReady,
                           'amount'=>$request->amount,
                           'mpesa_c2b_id'=>$payment->trans_id,
                           'invoice'=>time()
                       ]);
                       MpesaC2B::findOrFail($payment->id)->update(
                          [ 'invoice_number'=>$order->invoice]
                       );

                       $input=array(
                           'order_id'=>$order->id,
                           'total'=>\Cart::session(Auth::id())->getTotal(),
                           'shipping'=>0.00,
                           'tax'=>0.00,
                           'cart'=>$cart,
                           'user'=>Auth::user(),
                       );

                       Mail::send('mail.receipt', $input, function ($message) use($input){
                           $message->to(Auth::user()->email);
                           $message->from('cerve@cervekenya.com');
                           $message->subject('Order Confirmation');

                       });
                       Mail::send('mail.order', $input, function ($message) use($input){
                           $message->to('jnyawach@cervekenya.com');
                           $message->from('cerve@cervekenya.com');
                           $message->subject('New Order');

                       });
                      \Cart::session(Auth::id())->clear();


                       return view('account.payment.index', compact('order'));
                       }else{
                           return redirect()->back()->with('message', 'Sorry unknown error occured!. Email: support@cervekenya.com');
                       }
                   }

               }
            }else{
                return redirect()->back()->with('message', 'Sorry Transaction Code not found. Please try again');
            }






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
