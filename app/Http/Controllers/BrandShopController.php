<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\Review;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class BrandShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::inRandomOrder()->paginate(12);
        $categories=ProductCategory::all();


        return  view('brand-shop.index' ,compact( 'products','categories'));
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
        $product=Product::findBySlugOrFail($id);
        $reviews=Review::where('product_id', $product->id)->get();
        $related=Product::where('category_id', $product->category_id)->where('slug','!=', $id)->inRandomOrder()->get();
        $photos=$product->getMedia('product_photos');

        return view('brand-shop.show', compact('product', 'related', 'reviews', 'photos'));
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


    public function search(Request $request){
        $search= $request->name;
        $products=QueryBuilder::for(Product::class)
            ->allowedFilters(['name'])

            ->paginate(50);
        return view('search', compact('products','search'));
    }

    public  function  category($id){
        $category=ProductCategory::findBySlugOrFail($id);
        $products=Product::where('category_id', $category->id)->paginate(20);

        return view('brand-shop/category', compact('products','category'));
    }

}


