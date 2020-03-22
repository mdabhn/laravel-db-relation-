<?php

namespace App\Http\Controllers;

use App\GroupMember;
use App\ReqGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class GroupMembersController extends Controller
{
    public function show($id)
    {
        $members = DB::select('select * from group_members where group_id = ?', [$id]);
        return view('assets.subGroups.members')->with('members', $members);
    }

    public function store(Request $request)
    {
        // dd($request->id, $request->group_id, $request->sender_id);
        $userDetails = DB::select('select * from users where id = ?', [auth()->user()->id]);
        GroupMember::create([
            'name' => $userDetails[0]->name,
            'points' => 0,
            'group_id' => $request->group_id,
            'user_id' => $request->sender_id
        ]);
        $id = $request->id;
        ReqGroup::find($id)->delete();
        Session::flash('added', 'Succefully added the member to the group');
        return redirect()->back();
    }

    public function delmem($id)
    {
        GroupMember::find($id)->delete();
        Session::flash('deleted', 'Member Has been Removed ...');
        return redirect()->back();
    }
}
