<?php

namespace App\Http\Controllers;

use App\Group_details;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class GroupDetailsController extends Controller
{
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

    public function edit($id)
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

    public function destroyx($id)
    {
        DB::table('group_details')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function archived($id)
    {
        $user = auth()->user()->id;
        $name = User::find($user);
        // dd($name->name);
        DB::table('group_details')
            ->where('id', $id)
            ->update([
                'type' => 0,
                'created_by' => $name->name
            ]);
        return redirect()->back();
    }
    public function moveArchived($id)
    {
        $user = auth()->user()->id;
        $name = User::find($user);
        // dd($name->name);
        DB::table('group_details')
            ->where('id', $id)
            ->update([
                'type' => 1,
                'created_by' => $name->name
            ]);
        return redirect()->back();
    }
}
