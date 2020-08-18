<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Photo;
use App\PortfolioPhoto;
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
        if($file=$request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;

        }

        if($files=$request->file('path')) {
            foreach ($files as $file){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $data[]=$name;

            }
        }

        $input['path']=json_encode($data);

       Product::create($input);

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
        $input= $request->all();
        if($file=$request->file('video_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('videos', $name);
            $video = Video::create(['path' => $name]);
            $input['video_id'] = $video->id;

        }
        if($file=$request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;

        }

        if($files=$request->file('path')) {
            foreach ($files as $file){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $data[]=$name;

            }
        }

        if(!empty($data)){
            $input['path']=json_encode($data);
        }

        $find->update($input);

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
        $photos=json_decode($product->path);
        foreach ($photos as $photo){
            unlink(public_path().'/images/'. $photo);
        }
        if ($product->video){
            unlink(public_path(). $product->video->path);
        }
        if ($product->photo){
            unlink(public_path(). $product->photo->path);
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
