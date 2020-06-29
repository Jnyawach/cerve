<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductCategory;
use App\ProductPhotos;
use App\Video;
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
        return view('admin.products.create', compact('category'));
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
        if($file=$request->file('video_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('videos', $name);
            $video = Video::create(['path' => $name]);
            $input['video_id'] = $video->id;

        }

        $product=Product::create($input);

        if($files=$request->file('product_id')) {
            foreach ($files as $file){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                ProductPhotos::create(['path'=>$name, 'product_id'=>$product->id]);
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
        return view('admin.products.show', compact('product'));
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
        return view('admin.products.edit', compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
        $find=Product::findOrFail($id);
        $input= $request->all();
        if($file=$request->file('video_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('videos', $name);
            $video = Video::create(['path' => $name]);
            $input['video_id'] = $video->id;

        }

        $find->update($input);

        if($files=$request->file('product_id')) {
            foreach ($files as $file){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo=ProductPhotos::where('product_id', $find->id);
                $photo->update(['path'=>$name]);
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
        $images=$product->photos();
        foreach ($product->photos() as $image){
            unlink(public_path(). $image->photo->path);
        }


        if ($product->video){
            unlink(public_path(). $product->video->path);
        }

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


}
