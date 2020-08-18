<?php

namespace App\Http\Controllers;

use App\Faq;
use App\FaqCategory;
use App\Http\Requests\FaqRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FaqAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faqs=Faq::all();
        $categories=FaqCategory::all();
        return view('admin.faqs.index', compact('categories', 'faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=FaqCategory::pluck('name', 'id')->all();
        return view('admin.faqs.create' , compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        //
        $faq=Faq::create($request->all());
        Session::flash('faq_message', 'The Faq has been successfully Added');

        return redirect('/admin/homepage/faqs');
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
        $faqs=Faq::where('category_id', $id)->get();
        $categories=FaqCategory::all();
        return view('admin.faqs.show', compact('categories', 'faqs'));


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
        $faq=Faq::findOrFail($id);
        $category=FaqCategory::pluck('name', 'id')->all();
        return view('admin.faqs.edit', compact('category', 'faq'));
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
        $faq=Faq::findOrFail($id)->update($request->all());
        Session::flash('faq_message', 'The Faq has been successfully Updated');

        return redirect('/admin/homepage/faqs');
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
        $faq=Faq::findOrFail($id)->delete();
        Session::flash('faq_message', 'The Faq has been successfully Deleted');

        return redirect('/admin/homepage/faqs');
    }
}
