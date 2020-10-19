<?php

namespace App\Http\Controllers;

use App\Order;
use App\ProductPrinting;
use Illuminate\Http\Request;

class OrdersAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pending_count=Order::where('is_active',0)->get();
        $orders=Order::all();
        return  view('admin.orders.index', compact('orders','pending_count'));
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
        $pending_count=Order::where('is_active',0)->get();
        $order=Order::findOrFail($id);




        return  view('admin.orders.show', compact('pending_count','order'));
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
        $input=$request->is_active;
        $order=Order::findOrFail($id);
        $order->update(['is_active'=>$input]);
        return  redirect()->back();

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

    public function  pending(){
        $pending_count=Order::where('is_active',0)->get();
        $pending=Order::where('is_active',0)->get();
        return view('admin/orders/pending', compact('pending','pending_count'));
    }

    public function  process(){
        $pending=Order::where('is_active',1)->get();
        $pending_count=Order::where('is_active',0)->get();
        return view('admin/orders/processing', compact('pending','pending_count'));
    }

    public function  complete(){
        $pending=Order::where('is_active',2)->get();
        $pending_count=Order::where('is_active',0)->get();
        return view('admin/orders/complete', compact('pending','pending_count'));
    }

    public function  cancel(){
        $pending=Order::where('is_active',3)->get();
        $pending_count=Order::where('is_active',0)->get();
        return view('admin/orders/cancelled', compact('pending','pending_count'));
    }
}
