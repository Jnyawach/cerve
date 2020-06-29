<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUsersRequest;
use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users= User::all();
        return view('admin/users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role=Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        if(trim($request->password)==''){
            $input=$request->except('password');
        }else{
            $input=$request->all();
            $input['password']= bcrypt($request->password);
        }
        User::create($input);
        Session::flash('deleted_user', 'The User has been Created');

        return redirect('admin/homepage/users');

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
        $user=User::findOrFail($id);
        return view('admin.users.show', compact('user'));
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
        $user=User::findOrFail($id);
        $role=Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('role','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUsersRequest $request, $id)
    {
        //
        $user=User::findOrFail($id);
        if(trim($request->password)==''){
            $input=$request->except('password');
        }else{
            $input=$request->all();
            $input['password']= bcrypt($request->password);
        }

        $user->update($input);
        Session::flash('deleted_user', 'The User has been Updated');
        return redirect('admin/homepage/users');
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
        $user=User::findOrFail($id);
        $user->delete();
        Session::flash('deleted_user', 'The User has been deleted');

        return redirect('admin/homepage/users');
    }
}
