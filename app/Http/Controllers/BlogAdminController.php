<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Blog::all();
        return view('admin.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        //
        $input=$request->all();
        $input['user_id']=Auth::id();
        $blog=Blog::create($input);
        if($file=$request->file('photo')) {

            $blog->addMedia($file)->toMediaCollection('blog_photo');
        }

        Session::flash('post_issue', 'The Post has been Created');

        return redirect('admin/homepage/blog');
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
        $post=Blog::findBySlugOrFail($id);
        return view('admin.blog.show', compact('post'));
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
        $post=Blog::findOrFail($id);
        return view('admin.blog.edit', compact('post'));
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
        $input= $request->all();
        $result=Blog::findOrFail($id);
        $input['user_id']=Auth::id();
        $result->update($input);

        if($file=$request->file('photo')) {
            $result->clearMediaCollection('blog_photo');

            $result->addMedia($file)->toMediaCollection('blog_photo');
        }
        Session::flash('post_issue', 'The Post has been edited');

        return redirect('admin/homepage/blog');
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
        $post=Blog::findOrFail($id);
        $post->delete();

        Session::flash('post_issue', 'The post has been deleted');

        return redirect('admin/homepage/blog');
    }
}
