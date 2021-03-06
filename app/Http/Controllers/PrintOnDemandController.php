<?php

namespace App\Http\Controllers;

use App\Branding;
use App\Document;
use App\Http\Requests\PrintOnDemandRequest;
use App\Photo;
use App\PrintOnDemand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PrintOnDemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $branding=Branding::pluck('name','id')->all();
        return view('print-on-demand.index', compact('branding'));
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
    public function store(PrintOnDemandRequest $request)
    {
        //
        $input=$request->all();
        $input['user_id']=Auth::user();
        $print=PrintOnDemand::create($input);
        if($file=$request->file('artwork_id')) {

            $print->addMedia($file)->toMediaCollection('print_document');
        }


        Session::flash('print_message', 'Thank you for contacting Cerve, we will get back to you shortly');

        return redirect('print-on-demand');

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
        $input=$request->all();
        $input['user_id']=Auth::user();
        $print=PrintOnDemand::findOrFail($id);
        $print->create($input);
        if($file=$request->file('artwork_id')) {
            $print->clearMediaCollection('print_document');
            $print->addMedia($file)->toMediaCollection('print_document');
        }

        Session::flash('job_message', 'Your application has been successfully updated');

        return redirect('admin/homepage/printing');
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
}
