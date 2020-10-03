<?php

namespace App\Http\Controllers;

use App\Branding;
use App\Document;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\Product;
use App\ProductPrinting;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BrandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return view('branding.index');
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
    public function store(OrderRequest $request)
    {
        //
        \Cart::session('branding')->clear();
        $order=$request->all();
        $user=Auth::user();
        $printing=ProductPrinting::findOrFail($request->printing);
        $brand_price=$printing->cost_1;
        $quantity=$request->quantity;
//Branding Price
        switch ($brand_price){
            case $quantity>=1 && $quantity<=3:
                $brand_price=$printing->cost_1/$quantity;
                break;
            case $quantity>=4 && $quantity<=15:
                $brand_price=$printing->cost_2/$quantity;
                break;
            case $quantity>=16 && $quantity<=50:
                $brand_price=$printing->cost_3;
                break;
            case $quantity>=51:
                $brand_price=$printing->cost_4;
                break;
        }
        //TotalBranding Price
        $totalBrandPrice=1500;

        if($brand_price==1500){
            $totalBrandPrice==1500;
        }elseif ($brand_price==300){
            $totalBrandPrice==300;
        }else{
            $totalBrandPrice=$brand_price*$request->quantity;
        }

//set product price
        $product=Product::findOrFail($request->product_id);

        $price=$product->price;
        switch ($price){
            case $quantity>=1 && $quantity<=10:
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
        if($duplicate=\Cart::session(Auth::id())->get($request->id)) {
            Session::flash('cart_message', 'Product is already added to cart');
            return redirect('cart');
        }else {
            if ($file = $request->file('artwork_id')) {
                $artwork=$user->addMedia($file)->toMediaCollection('submitted_artwork');
            }
            $order['brand_price'] = $brand_price;
            $userId = Auth::id();
            $rowId = $request->product_id;
            $payment=0;
            $branding = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'branding',
                'type' => 'printing',
                'target' => 'subtotal',
                'order' => 1,
                'value' => '+' . $brand_price,
            ));


            $item = \Cart::session($userId)->add(array(
                'id' => $rowId,
                'name' => $request->name,
                'price' => $price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'small' => $request->small,
                    'medium' => $request->medium,
                    'large' => $request->large,
                    'extra_large' => $request->extra_large,
                    'totalPrice' => $request->total_price,
                    'printing' => $brand_price,
                    'totalPrinting' => $totalBrandPrice,
                   'artwork'=>$artwork->id,
                    'payment'=>$payment
                ),
                'conditions' => $branding,
                'associatedModel' => $product

            ));
            \Cart::session('branding')->clear();
            Session::flash('cart_message', 'Product successfully added to cart');
            return redirect('cart');
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
