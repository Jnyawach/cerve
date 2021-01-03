<?php

namespace App\Http\Controllers;

use App\Branding;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductCategory;
use App\ProductPrinting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::all();
        return  view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $category=ProductCategory::pluck('name', 'id')->all();
        $printing=Branding::all();
        return view('admin.products.create', compact('category','printing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $input= $request->all();
        dd($input);
        $product=Product::create($input);
        if($request->branding_id){
          $product->branding()->sync($request->branding_id);

        }

        if($file=$request->file('video')) {

            $product->addMedia($request->video)->toMediaCollection('product_video');
        }
        if($file=$request->file('branded')) {

            $product->addMedia($request->branded)->toMediaCollection('branded_sample');
        }

        if($files=$request->file('photos')) {
            foreach ($files as $file){

                $product->addMedia($file)->toMediaCollection('product_photos');
            }
        }
        Session::flash('product_message', 'The Product has been successfully Created');

        return redirect('/admin/homepage/products');

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
        $product=Product::findBySlugOrFail($id);
        $photos=$product->getMedia('product_photos');
        return view('admin.products.show', compact('product','photos'));
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
        $category=ProductCategory::pluck('name', 'id')->all();
        $product= Product::findOrFail($id);
        $printing=Branding::all();
        return view('admin.products.edit', compact('product','category','printing'));
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
        $find=Product::findOrFail($id);
        $input=$request->all();
        $find->update($input);
        if($request->branding_id){
            $find->branding()->sync($request->branding_id);
        }

        if($file=$request->file('video')) {

            $find->clearMediaCollection('product_video');
            $find->addMedia($request->video)->toMediaCollection('product_video');
        }
        if($file=$request->file('branded')) {

            $find->clearMediaCollection('branded_sample');
            $find->addMedia($request->branded)->toMediaCollection('branded_sample');
        }

        if($files=$request->file('photos')) {
            foreach ($files as $file){
                $find->clearMediaCollection('product_photos');

            }

        }

        if($files=$request->file('photos')) {
            foreach ($files as $file){
                $find->addMedia($file)->toMediaCollection('product_photos');
            }

        }


        Session::flash('product_message', 'The Product has been successfully Updated');

        return redirect('/admin/homepage/products');
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
        $product=Product::findOrFail($id);
        $product->delete();

        Session::flash('product_message', 'The product has been deleted');

        return redirect('admin/homepage/products');
    }
    public function live(){
        $products=Product::where('is_active',1)->where('stock','>',0)->get();
        return view('live', compact('products'));
    }
    public function active(){
        $products=Product::where('is_active',0)->get();
        return view('active', compact('products'));
    }
    public function sold(){
        $products=Product::where('stock',0)->get();
        return view('sold', compact('products'));
    }

    public  function costing($id){
        $product=Product::findBySlugOrFail($id);
        $branding=Branding::pluck('name', 'id')->all();

        return view('costing', compact('product','branding'));
    }

    public  function costStore(Request $request){
        $cost=$request->all();
        ProductPrinting::create($cost);
        Session::flash('print_message', 'Printing cost successfully created');
        return redirect()->back();

    }
    public  function costDelete($id){
        $product=ProductPrinting::findOrFail($id);
        $product->delete();
        Session::flash('print_message', 'Printing cost successfully deleted');
        return redirect()->back();

    }

    public  function costUpdate($id){
        $cost=ProductPrinting::findOrFail($id);
        $branding=Branding::pluck('name', 'id')->all();
        return view('cost_update', compact('cost','branding'));
    }

    public  function costUpdated(Request $request, $id ){
        $cost=ProductPrinting::findOrFail($id);

       $cost->update($request->all());
        Session::flash('print_message', 'Printing cost successfully deleted');
        return redirect()->back();
    }



}
