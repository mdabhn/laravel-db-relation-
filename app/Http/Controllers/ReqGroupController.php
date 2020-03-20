<?php

namespace App\Http\Controllers;

use App\ReqGroup;
use Illuminate\Http\Request;

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
        return redirect()->back();
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
