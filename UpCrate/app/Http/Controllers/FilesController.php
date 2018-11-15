<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\File;
use App\Owns;
use App\User; 

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if not logged in, then redirect to register page.
        /*if (!Auth::id()){
            return view('auth.register');
        }

        */

        $data['files'] = Owns
            ::where('user_id', '=', Auth::id())
            ->join('file', 'owns.file_id', '=', 'file.id')
            ->select('file.id', 'file.file_path', 'file.visibility', 'file.name')
            ->getQuery()
            ->get();
        
        $data['count'] = $data['files']->count();
        return view('files.index')->with('data', $data);
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
        // if not logged in, then redirect to register page.
        if (!Auth::id()){
            return view('auth.register');
        }

        // TODO: check if size of file is bigger than 2MB to throw error, otherwise continue.
        
        // creation of the new file
        $file = new File;
        
        // cache the file
        $tmp = $request->file('file');

        // generate a new filename. getClientOriginalExtension() for the file extension
        $file->name = $tmp->getClientOriginalName();
        
        // save to storage/app/photos as the new $filename
        $file->file_path = $tmp->storeAs('files', $file->name . time());

        // set public visibility to false
        if ($request->get('visibility', 0) == 'Private'){
            $file->visibility = 0;
        } else {
            $file->visibility = 1;
        }

        // persist to database
        $file->save();

        // inserts into owns relation 
        $owns = new Owns;
        $owns->file_id = $file->id;
        $owns->user_id = Auth::id();

        $owns->save();
        
        return redirect()->route('files.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if not logged in, then redirect to register page.
        if (!Auth::id()){
            return view('auth.register');
        }

        $data['files'] = Owns
            ::where('user_id', '=', Auth::id())
            ->join('file', 'owns.file_id', '=', 'file.id')
            ->select('file.id', 'file.file_path', 'file.visibility', 'file.name')
            ->getQuery()
            ->get();
        
        $tmp = $data['files']->where('id', '=', $id)->first();

        // return if user doesn't have access to resource
        if (!$tmp){
            return redirect()->route('files.index');
        }

        return Storage::download($tmp->file_path, $tmp->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // if not logged in, then redirect to register page.
        if (!Auth::id()){
            return view('auth.register');
        }

        $data['files'] = Owns
            ::where('user_id', '=', Auth::id())
            ->join('file', 'owns.file_id', '=', 'file.id')
            ->select('file.id', 'file.file_path', 'file.visibility', 'file.name')
            ->getQuery()
            ->get();
        
        $toDelete = $data['files']->where('id', '=', $id)->first();

        if (!$toDelete){
            return view('home');
        }

        Storage::delete($toDelete->file_path);
        
        $toDelete->delete();


        return redirect()->route('files.index');
    }
}
