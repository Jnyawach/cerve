<?php

namespace App\Http\Controllers;

use App\Branding;
use App\PrintOnDemand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPrintOnDemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $print=PrintOnDemand::where('status', 0)->get();
        $projects=PrintOnDemand::all();
        return  view('admin.printing.index', compact('projects','print'));
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

        $project=PrintOnDemand::findOrFail($id);
        return  view('admin.printing.show', compact('project'));
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
        $branding=Branding::pluck('name','id')->all();
        $project=PrintOnDemand::findOrFail($id);
        return view('admin.printing.edit', compact('project','branding'));
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
        $input= $request->status;
        $project=PrintOnDemand::findOrFail($id);
        $project->update(['status'=>$input]);

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
        $job=PrintOnDemand::findOrFail($id);
        unlink(public_path(). $job->artwork->path);
        $job->delete();

        Session::flash('job_message', 'The project has been successfully deleted');

        return redirect('admin/homepage/printing');
    }

    public function active(){
        $print=PrintOnDemand::where('status', 0)->get();
        $projects=PrintOnDemand::where('status', 0)->get();
        return view('admin/printing/active', compact('projects','print'));
    }

    public function processing(){
        $print=PrintOnDemand::where('status', 0)->get();
        $projects=PrintOnDemand::where('status', 1)->get();
        return view('admin/printing/processing', compact('projects','print'));
    }

    public function complete(){
        $print=PrintOnDemand::where('status', 0)->get();
        $projects=PrintOnDemand::where('status', 2)->get();
        return view('admin/printing/complete', compact('projects','print'));
    }

    public function cancel(){
        $print=PrintOnDemand::where('status', 0)->get();
        $projects=PrintOnDemand::where('status', 3)->get();
        return view('admin/printing/cancel', compact('projects','print'));
    }

}
