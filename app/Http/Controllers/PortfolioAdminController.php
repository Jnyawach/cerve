<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PortfolioRequest;
use App\Portfolio;
use App\PortfolioPhoto;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PortfolioAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $portfolios=Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=Category::pluck('name', 'id')->all();
        return view('admin.portfolio.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        //
        $input= $request->all();
        if($file=$request->file('video_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('videos', $name);
            $video = Video::create(['path' => $name]);
            $input['video_id'] = $video->id;

        }

        $portfolio=Portfolio::create($input);

        if($files=$request->file('portfolio_id')) {
            foreach ($files as $file){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                PortfolioPhoto::create(['path'=>$name, 'portfolio_id'=>$portfolio->id]);
            }
        }

        Session::flash('portfolio_message', 'The Project has been successfully Created');

        return redirect('/admin/homepage/portfolio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $portfolio=Portfolio::findBySlugOrFail($slug);
        return view('admin.portfolio.show', compact('portfolio'));
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
        $portfolio=Portfolio::findOrFail($id);
        $category=Category::pluck('name', 'id')->all();
        return view('admin.portfolio.edit', compact('category','portfolio'));
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
        $find=Portfolio::findOrFail($id);
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
                $photo=PortfolioPhoto::where('portfolio_id', $find->id);
                $photo->update(['path'=>$name]);
            }
        }

        Session::flash('portfolio_message', 'The Project has been successfully Updated');

        return redirect('/admin/homepage/portfolio');

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
        $portfolio=Portfolio::findOrFail($id);
        $images=$portfolio->photos();
        foreach ($portfolio->photos() as $image){
            unlink(public_path(). $image->photo->path);
        }

     if($portfolio->video){
         unlink(public_path(). $portfolio->video->path);
     }

        $portfolio->delete();

        Session::flash('portfolio_message', 'The Project has been successfully Deleted');

        return redirect('/admin/homepage/portfolio');
    }
}
