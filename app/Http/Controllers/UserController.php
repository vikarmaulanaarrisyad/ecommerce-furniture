<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        // $this->authorize('read user');
        if (!Gate::allows('user_access')) {
            abort(403, 'Cie Mau Ngapain tuh');
        }
        
        return $dataTable->render('backend.admin.users.index');
        // return view('backend.admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('user_create')) {
            return view('backend.admin.users.index');
        }
        abort(403, 'Cie Mau Ngapain tuh');
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
        if (Gate::allows('user_show')) {
            return view('backend.admin.users.index');
        }
        abort(403, 'Cie Mau Ngapain tuh');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('user_edit')) {
            return view('backend.admin.users.index');
        }
        abort(403, 'Cie Mau Ngapain tuh');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('user_delete')) {
            return view('backend.admin.users.index');
        }
        abort(403, 'Cie Mau Ngapain tuh');
    }
}
