<?php

namespace App\Http\Controllers;

use App\Career;
use App\Http\Requests\JobRequest;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs=Job::all();
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        //
        $job=Job::create($request->all());
        Session::flash('job_message', 'The Vacancy has been successfully added');

        return redirect('/admin/homepage/jobs');

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
        $job=Job::findBySlugOrFail($slug);

        return view('admin.jobs.show', compact('job'));
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
        $job=Job::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, $id)
    {
        //
        $job=Job::findOrFail($id);
        $job->update($request->all());
        Session::flash('job_message', 'The Vacancy has been successfully Updated');

        return redirect('/admin/homepage/jobs');
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
        $job=Job::findOrFail($id)->delete();
        Session::flash('job_message', 'The Vacancy has been successfully Deleted');

        return redirect('/admin/homepage/jobs');

    }
}
