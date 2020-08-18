<?php

namespace App\Http\Controllers;

use App\Branding;
use App\Http\Requests\PricingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pricings=Branding::all();
        return  view('admin.pricing.index', compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('admin.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PricingRequest $request)
    {
        //
        $pricing=$request->all();
        Branding::create($pricing);
        Session::flash('price_message', 'Brand guideline and price successfully added');
        return redirect('admin/homepage/pricing');

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
        $pricing=Branding::findOrFail($id);
        return  view('admin.pricing.edit', compact('pricing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PricingRequest $request, $id)
    {
        //
        $pricing=Branding::findOrFail($id);
        $pricing->update($request->all());
        Session::flash('price_message', 'Brand guideline and price successfully updated');
        return redirect('admin/homepage/pricing');
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
        $pricing=Branding::findOrFail($id)->delete();
        Session::flash('price_message', 'Brand guideline and price successfully deleted');
        return redirect('admin/homepage/pricing');
    }
}
