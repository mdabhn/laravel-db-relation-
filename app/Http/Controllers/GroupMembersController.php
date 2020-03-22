<?php

namespace App\Http\Controllers;

use App\GroupMember;
use App\ReqGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class GroupMembersController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->id, $request->group_id, $request->sender_id);

        GroupMember::create([
            'group_id' => $request->group_id,
            'user_id' => $request->sender_id
        ]);

        $id = $request->id;

        // dd($id);

        ReqGroup::find($id)->delete();

        Session::flash('added', 'Succefully added the member to the group');
        return redirect()->back();
    }
}
