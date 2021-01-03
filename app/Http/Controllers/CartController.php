<?php

namespace App\Http\Controllers;

use App\Branding;
use App\Order;
use App\OrderPrinting;
use App\Product;
use App\ProductPrinting;


use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $lover=Product::where('is_active',1)->inRandomOrder()->take(3)->get();
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
        $quantity = $request->quantity_small + $request->quantity_medium + $request->quantity_large + $request->quantity_extralarge;
        if ($quantity <= 0) {
            return redirect()->back()->with('message', 'Please Add the Quantity of the size(s)');
        } else {
            $product = Product::findOrFail($request->id);
//Quantity Calculation
            $quantity = $request->quantity_small + $request->quantity_medium + $request->quantity_large + $request->quantity_extralarge;
            $qty = $quantity;
            $price = $product->price;
            switch ($price) {
                case $quantity >= 1 && $quantity <= 10:
                    $price = $product->price;
                    break;
                case $quantity >= 11 && $quantity <= 30:
                    $price = $product->price_2;
                    break;
                case $quantity >= 31 && $quantity <= 50:
                    $price = $product->price_3;
                    break;
                case $quantity >= 51 :
                    $price = $product->price_4;
                    break;
            }

//Check if Product Already in cart
            if ($duplicate = \Cart::session(Auth::id())->get($request->id)) {
                Session::flash('cart_message', 'Product is already added to cart');
                return redirect('cart');
            } else {
                if ($request->branding == 'yes') {
                    if(!empty($request->printing)){

                        $printing = Branding::findOrFail($request->printing);
                    $brand_price = $printing->cost_1;
                    //Branding Price
                    if ($product->category->name == 'Clothing/Apparel' && $quantity <= 15) {
                        $brand_price = $printing->cost_1 / $quantity;
                    } else {
                        //Determine Print9ng Cost


                        switch ($brand_price) {
                            case $quantity >= 1 && $quantity <= 3:
                                $brand_price = $printing->cost_1 / $quantity;
                                break;
                            case $quantity >= 4 && $quantity <= 15:
                                $brand_price = $printing->cost_2;
                                break;
                            case $quantity >= 16 && $quantity <= 50:
                                $brand_price = $printing->cost_3;
                                break;
                            case $quantity >= 51:
                                $brand_price = $printing->cost_4;
                                break;
                        }
                    }

                    //TotalBranding Price
                    $totalBrandPrice = 1500;

                    if ($brand_price == 1500) {
                        $totalBrandPrice == 1500;
                    } elseif ($brand_price == 300) {
                        $totalBrandPrice == 300;
                    } else {
                        $totalBrandPrice = $brand_price * $qty;
                    }
                    $order['brand_price'] = $brand_price;
                    $userId = Auth::id();
                    $rowId = $request->id;

                    $branding = new CartCondition(array(
                        'name' => 'branding',
                        'type' => 'printing',
                        'target' => 'subtotal',
                        'order' => 1,
                        'value' => '+' . $brand_price,
                    ));

                    $productPrinting = OrderPrinting::create([
                        'user_id' => $userId,
                        'product_id' => $request->id,
                        'product_printing_id' => $request->printing,
                        'description' => $request->description

                    ]);

                    if ($file = $request->file('artwork')) {

                        $productPrinting->addMedia($request->artwork)->toMediaCollection('order_artwork');
                        $printartwork = OrderPrinting::findOrFail($productPrinting->id);
                        $printingDocument = $printartwork->getFirstMedia('order_artwork')->getUrl();

                    } else {
                        $printingDocument = null;
                    }


                    $item = \Cart::session($userId)->add(array(
                        'id' => $rowId,
                        'name' => $request->name,
                        'price' => $price,
                        'quantity' => $qty,
                        'attributes' => array(
                            'small' => $request->small,
                            'medium' => $request->medium,
                            'large' => $request->large,
                            'extra_large' => $request->extra_large,
                            'totalPrice' => $request->total_price,
                            'printing' => $brand_price,
                            'totalPrinting' => $totalBrandPrice,
                            'order_printing' => $request->printing,
                            'printType' => $request->printing,
                            'printDescription' => $request->description,
                            'printArtwork' => $printingDocument


                        ),

                        'associatedModel' => $product,

                        'conditions' => $branding

                    ));

                    Session::flash('cart_message', 'Product successfully added to cart');
                    return redirect('cart');
                    }else{
                        return redirect()->back()->with('message','Please ensure that you select printing type');
                    }

                } else {


                    $userId = Auth::id();
                    $product = Product::findOrFail($request->id);
                    $rowId = $request->id;
                    $totalPrice = $qty * $price;
                    $printing = 0;
                    $totalPrinting = $printing * $qty;


                    $item = \Cart::session($userId)->add(array(
                        'id' => $rowId,
                        'name' => $request->name,
                        'price' => $price,
                        'quantity' => $qty,
                        'attributes' => array(
                            'small' => $request->quantity_small,
                            'medium' => $request->quantity_medium,
                            'large' => $request->quantity_large,
                            'extra_large' => $request->quantity_extralarge,
                            'totalPrice' => $totalPrice,
                            'printing' => $printing,
                            'totalPrinting' => $totalPrinting,
                            'printType' => null,
                            'printDescription' => null,
                            'printArtwork' => null,
                        ),

                        'associatedModel' => $product

                    ));

                    Session::flash('cart_message', 'Product successfully added to cart');
                    return redirect('cart');


                }
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

        \Cart::session(Auth::id())->remove($id);


        Session::flash('cart_message', 'Product successfully removed from cart');

        return redirect()->back();
    }

    public function checkout(){
        return view('cart/checkout');
    }
}
