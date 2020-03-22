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
    public function index()
    {
        $groups = User::find(auth()->user()->id)->groups;
        return view('assets.group.index')->with('info', $groups);
    }

    public function create()
    {
        return view('assets.group.create');
    }

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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $group = Group::find($id);
        $user = User::find(auth()->user()->id);
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

    public function explore()
    {
        $id = auth()->user()->id;
        $data = DB::select('select * from groups where user_id != ?', [$id]);
        $requested = DB::select('select * from req_groups where sender_id = ?', [$id]);
        return view('assets.group.explore')->with('info', $data)
            ->with('requested', $requested);
    }

    public function assignedGroups()
    {
        $aGroups = DB::select('select * from group_members where user_id = ?', [auth()->user()->id]);
        $groups = [];
        for ($i = 0; $i < sizeof($aGroups); $i++) {
            $group = DB::select('select * from groups where id = ?', [$aGroups[$i]->group_id]);
            array_push($groups, $group);
        }

        // dd($groups);

        return view('assets.subGroups.assigned')->with('groups', $groups);
    }
}
