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

        if($files=$request->file('path')) {
            foreach ($files as $file){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $data[]=$name;

            }
        }

        $input['path']=json_encode($data);

        Portfolio::create($input);

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
        $photos=json_decode($portfoliot->path);
        foreach ($photos as $photo){
            unlink(public_path().'/images/'. $photo);
        }
        if ($portfolio->video){
            unlink(public_path(). $portfolio->video->path);
        }

        $portfolio->delete();

        Session::flash('portfolio_message', 'The Project has been successfully Deleted');

        return redirect('/admin/homepage/portfolio');
    }
}
