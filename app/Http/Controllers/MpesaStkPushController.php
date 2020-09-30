<?php

namespace App\Http\Controllers;

use App\MpesaStkPush;
use Illuminate\Http\Request;

class MpesaStkPushController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mpesa.stk-push.index', [
            'data' => MpesaStkPush::paginate(20),
        ]);
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
     * @param  \App\MpesaStkPush  $sTKPush
     * @return \Illuminate\Http\Response
     */
    public function show(MpesaStkPush $sTKPush)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MpesaStkPush  $sTKPush
     * @return \Illuminate\Http\Response
     */
    public function edit(MpesaStkPush $sTKPush)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MpesaStkPush  $sTKPush
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MpesaStkPush $sTKPush)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MpesaStkPush  $sTKPush
     * @return \Illuminate\Http\Response
     */
    public function destroy(MpesaStkPush $sTKPush)
    {
        //
    }
}
