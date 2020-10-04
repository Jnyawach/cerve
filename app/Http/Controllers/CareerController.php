<?php

namespace App\Http\Controllers;

use App\Career;
use App\Document;
use App\Http\Requests\CareerRequest;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user()->id;
        $jobs=Career::where('user_id', $user)->paginate(10);
        return view('account.career.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('account.career.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CareerRequest $request)
    {
        //
        $input=$request->all();
        $input['user_id']=Auth::id();
        $career=Career::create($input);

        if($file=@$request->file('resume_id')){
            $career->addMedia($file)->toMediaCollection('resume');
        }
        Session::flash('job_message', 'Your application has been successfully submitted');

        return redirect('account/homepage/career');
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
        $job=Career::findOrFail($id);
        return  view('account.career.show', compact('job'));
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
        $job=Career::findOrFail($id);
        return view('account.career.edit', compact('job'));
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
        $input['user_id']=Auth::id();
        $career= Career::findOrFail($id);
        $career->update($input);
        if($file=@$request->file('resume_id')){
            $career->clearMediaCollection('resume');
            $career->addMedia($file)->toMediaCollection('resume');
        }

        Auth::user()->career()->whereId($id)->first()->update($input);

        Session::flash('job_message', 'Your application has been successfully updated');

        return redirect('account/homepage/career');

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
        $job=Career::findOrFail($id);
        $job->delete();

        Session::flash('job_message', 'The application has been deleted');

        return redirect('account/homepage/career');
    }

    public function application($id){
        $job=Job::findBySlugOrFail($id);
        return view('application', compact('job'));
    }
}
