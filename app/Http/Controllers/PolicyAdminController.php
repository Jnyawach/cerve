<?php

namespace App\Http\Controllers;

use App\Http\Requests\PolicyRequest;
use App\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PolicyAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $policies=Policy::all();
        return view('admin.policy.index', compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PolicyRequest $request)
    {
        //
        $policy=Policy::create($request->all());
        Session::flash('policy_message', 'The Policy has been successfully Added');

        return redirect('/admin/homepage/policy');
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
        $policy=Policy::findOrFail($id);
        return view('admin.policy.show', compact('policy'));
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
        $policy=Policy::findOrFail($id);
        return view('admin.policy.edit', compact('policy'));
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
        $policy=Policy::findOrFail($id)->update($request->all());
        Session::flash('policy_message', 'The Policy has been successfully Updated');

        return redirect('/admin/homepage/policy');
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
        $policy=Policy::findOrFail($id)->delete();
        Session::flash('policy_message', 'The Policy has been successfully deleted');

        return redirect('/admin/homepage/policy');
    }
}
