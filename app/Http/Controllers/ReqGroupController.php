<?php

namespace App\Http\Controllers;

use App\ReqGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReqGroupController extends Controller
{

    public function index()
    { }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $userDetails = DB::select('select * from users where id = ?', [auth()->user()->id]);
        // dd($userDetails);

        ReqGroup::create([
            'sender_id' => $userDetails[0]->id,
            'name' => $userDetails[0]->name,
            'group_id' => $request->group_id
        ]);

        return redirect()->back();
    }


    public function show($id)
    {
        $userRequeset = DB::select('select * from req_groups where group_id = ?', [$id]);
        return view('assets.group.urequest')->with('reqs', $userRequeset);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function delete($id)
    {
        DB::table('req_groups')->where('id', $id)->delete();
        return redirect()->back();
    }
}
