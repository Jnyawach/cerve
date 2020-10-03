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
        $portfolio=Portfolio::create($input);

        if($file=$request->file('video_id')) {

            $portfolio->addMedia($request->video_id)->toMediaCollection('portfolio_video');
        }

        if($files=$request->file('path')) {
            foreach ($files as $file){

                $portfolio->addMedia($file)->toMediaCollection('portfolio_photos');
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
        $photos=$portfolio->getMedia('portfolio_photos');
        return view('admin.portfolio.show', compact('portfolio','photos'));
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
        $find->update($input);
        if($file=$request->file('video_id')) {

            $find->clearMediaCollection('video_id');
            $find->addMedia($request->video_id)->toMediaCollection('video_id');
        }

        if($files=$request->file('path')) {
            foreach ($files as $file){
                $find->clearMediaCollection('portfolio_photos');

            }

        }

        if($files=$request->file('path')) {
            foreach ($files as $file){
                $find->addMedia($file)->toMediaCollection('portfolio_photos');
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
        $portfolio->delete();

        Session::flash('portfolio_message', 'The Project has been successfully Deleted');

        return redirect('/admin/homepage/portfolio');
    }
}
