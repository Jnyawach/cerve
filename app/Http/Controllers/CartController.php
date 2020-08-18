<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lover=Product::inRandomOrder()->take(3)->get();
        return view('cart.index', compact('lover'));
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
        if ($request->branding==1){
            Cart::instance('branding')->destroy();
            $product=Product::findOrFail($request->id);
            $price=$request->price;
            $quantity=$request->quantity_small+$request->quantity_medium+$request->quantity_large+$request->quantity_extralarge;
            $qty=$quantity;

            switch ($price){
                case $quantity=1 && $quantity<=10:
                    $price=$product->price;
                    break;
                case $quantity>=11 && $quantity<=30:
                    $price=$product->price_2;
                    break;
                case $quantity>=31 && $quantity<=50:
                    $price=$product->price_3;
                    break;
                case $quantity>=51 :
                    $price=$product->price_4;
                    break;
            }
            //storing the order data to session before putting it to cart
            Cart::instance('branding')->add($request->id, $request->name, $qty, $price,['small'=>$request->quantity_small,
                'medium'=>$request->quantity_medium, 'large'=>$request->quantity_large,'extra_large'=>$request->quantity_extralarge])->associate('App\Product');
            Session::flash('cart_message', 'Please add the branding guideline');
            return redirect('branding');
//if the user decided not to brand, the add to cart direct
        }else{
            $duplicate=Cart::search(function ($cartItem, $rowId)use($request){
                return $cartItem->id===$request->id;
            });
            if($duplicate->isNotEmpty()){
                Session::flash('cart_message', 'Product is already added to cart');
                return redirect('cart');
            }else{
                $product=Product::findOrFail($request->id);
                $price=$request->price;
                $quantity=$request->quantity_small+$request->quantity_medium+$request->quantity_large+$request->quantity_extralarge;
                $qty=$quantity;

                switch ($price){
                    case $quantity=1 && $quantity<=10:
                        $price=$product->price;
                        break;
                    case $quantity>=11 && $quantity<=30:
                        $price=$product->price_2;
                        break;
                    case $quantity>=31 && $quantity<=50:
                        $price=$product->price_3;
                        break;
                    case $quantity>=51 :
                        $price=$product->price_4;
                        break;
                }
               Cart::add($request->id, $request->name, $qty, $price,['small'=>$request->quantity_small,
                    'medium'=>$request->quantity_medium, 'large'=>$request->quantity_large,'extra_large'=>$request->quantity_extralarge])->associate('App\Product');

                Session::flash('cart_message', 'Product successfully added to cart');
                return redirect('cart');
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
        Cart::remove($id);
        Session::flash('cart_message', 'Product successfully removed from cart');

        return redirect()->back();
    }
}
