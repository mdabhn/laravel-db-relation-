<?php

namespace App\Http\Controllers;

use App\FileManager;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Session;

class FileController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file;
        $file_new_name = time() . $file->getClientOriginalName();
        $file->move('upload\files', $file_new_name);
        $user = User::find(auth()->user()->id);

        FileManager::create([
            'file_location' => 'upload/files/' . $file_new_name,
            'uploader_name' => $user->name,
            'uploader_id' => $user->id,
            'group_id' => $request->group_id,
            'task_id' => $request->task_id
        ]);

        Session::flash('Uploaded', 'The File has been uploaded succefully');
        return redirect()->back();
    }

    public function show($id)
    {
        $files = FileManager::where('group_id', $id)->get();

        return view('assets.files.groupFiles')->with('files', $files);
    }

    public function approve($id)
    {
        // dd($id);
        DB::update('update file_managers set approved = ? where id = ?', [1, $id]);
        Session::flash('Approved', 'The File has been Approved succefully');
        return redirect()->back();
    }

    public function delete($id)
    {
        $filename = FileManager::find($id);
        FileManager::find($id)->delete();
        unlink($filename->file_location);
        Session::flash('Deleted', 'The File has been Deleted succefully');
        return redirect()->back();
    }
}
