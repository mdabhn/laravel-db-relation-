<?php

namespace App\Http\Controllers;

use App\ReqGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReqGroupController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        ReqGroup::create([
            'sender_id' => auth()->user()->id,
            'group_id' => $request->group_id
        ]);
        $id = auth()->user()->id;
        $data = DB::table('groups')->whereNotIn('user_id', [$id])->get();
        $requested = DB::select('select * from req_groups where sender_id = ?', [$id]);
        // dd($requested);
        return view('assets.group.explore')->with('info', $data)
            ->with('requested', $requested);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
