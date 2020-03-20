<?php

namespace App\Http\Controllers;

use App\Group_details;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class GroupDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'task' => 'required'
        ]);

        Group_details::create([
            'group_id' => $request->group_id,
            'task' => $request->task,
            'type' => 1,
            'created_by' => $request->name,
        ]);

        Session::flash('created', 'Task is Created');
        return redirect()->back();
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
    public function edit($id, $val)
    {
        DB::table('group_details')
            ->where('id', $id)
            ->update(['type' => 2]);

        return redirect()->back();
    }

    public function editType($id)
    {
        $user = auth()->user()->id;
        $name = User::find($user);
        // dd($name->name);
        DB::table('group_details')
            ->where('id', $id)
            ->update([
                'type' => 3,
                'done_by' => $name->name
            ]);
        return redirect()->back();
    }

    public function editTypex($id)
    {
        $user = auth()->user()->id;
        $name = User::find($user);
        // dd($name->name);
        DB::table('group_details')
            ->where('id', $id)
            ->update([
                'type' => 4,
                'done_by' => $name->name
            ]);
        return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyx($id)
    {
        DB::table('group_details')->where('id', $id)->delete();
        return redirect()->back();
    }
}
