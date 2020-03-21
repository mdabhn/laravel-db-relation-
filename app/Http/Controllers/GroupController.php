<?php

namespace App\Http\Controllers;

use App\Group;
use App\Group_details;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = User::find(auth()->user()->id)->groups;
        return view('assets.group.index')->with('info', $groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assets.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Group::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        Session::flash('crt', 'Group has created');
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
    public function edit($id)
    {
        $group = Group::find($id);
        $user = User::find($group->user_id);
        $task = DB::select('select * from group_details where group_id = ? and type = ?', [$id, 1]);
        $progress = DB::select('select * from group_details where group_id = ? and type = ?', [$id, 2]);
        $done = DB::select('select * from group_details where group_id = ? and type = ?', [$id, 3]);
        // dd($task);
        return view('assets.group.edit')
            ->with('group', $group)
            ->with('user', $user)
            ->with('tasks', $task)
            ->with('progress', $progress)
            ->with('done', $done);
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
        //
    }

    public function explore()
    {
        $id = auth()->user()->id;
        $data = DB::select('select * from groups where user_id != ?', [$id]);
        $requested = DB::select('select * from req_groups where sender_id = ?', [$id]);

        dd($data);
        // return view('assets.group.explore')->with('info', $data);
        // ->with('requested', $requested);
    }
}
