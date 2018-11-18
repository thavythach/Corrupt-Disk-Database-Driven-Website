<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Owns;
use App\User; 
use App\IndividualAccess;
use App\GroupFile;
use App\GroupAccess;
use App\GroupMembers;

class GroupFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (!\Auth::check()){
            return view.('auth.register');
        }

        \DB::beginTransaction();

        // TODO: check size larger than 2MB
        
        $file = new File;
        
        $tmp = $request->file('new_file');
        if (!$tmp){
            \DB::rollbackTransaction();
            \DB::commit();
            return redirect()->route('groups.index'); 
        }

        // generate a new filename. getClientOriginalExtension() for the file extension
        $file->name = $tmp->getClientOriginalName();
        $file->file_path = $tmp->storeAs('files', $file->name . time());
        $file->visibility = 1; // groupFiles are always private

        // persist to the database
        $file->save();
        
        $gfList = $request->item_id;
        
        if ($gfList){
            for ($i=0; $i < count($gfList); $i++){
                    $groupFile = new GroupFile;
                    $groupFile->file_id = $file->id;
                    $groupFile->group_id = $gfList[$i];
                    $groupFile->save();
            }
        }

        \DB::commit();
        return redirect()->route('groups.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!\Auth::check()){
            return view.('auth.register');
        }

        // i can only download files that are part of my group. 
        //$id = the file id;
        // file nj groupfile (now have access to group_id)

        // $dl = File
        //     ::join('groupFile', 'groupFile.file_id', '=', 'file.id')
        //     ->where('id', '=', $id)
        //     ->join('group_members', 'group_members.user_id', '=', \Auth::id())

        $dl = File
            // ::where('file.id','=',$id)
            ::join('groupFile', 'file.id', '=', 'groupFile.file_id')
            ->join('group_members', 'group_members.group_id', '=', 'groupFile.group_id')
            ->orderBy('group_members.user_id')
            ->where('group_members.user_id', '=', \Auth::id())
            ->get()->first();


            // ::where('groupFile.group_id','=', $id)
            // ->join('file', 'file.id', '=', 'groupFile.file_id')
            // ->distinct('file.id')
            // ->join('group_members', 'group_members.user_id', '=', \Auth::id())
            // // ->select('file_path', 'name', 'groupFile.file_id')
            // ->get();

            // ->join('group_members', 'group_members.user_id', '=', \Auth::id())
            // ->select('file_path', 'id', 'name', 'user_id')
            // ->get()->first();
            // ->get();

            // $data['files'] = GroupFile
                // ::where('group_id','=', $id)
                // ->join('file', 'file.id', '=', 'groupFile.file_id')
                // ->distinct('file.id')
                // ->select('file_path', 'name', 'groupFile.file_id')
                // ->get();

        // return $dl;
        
        if (!$dl){
            return redirect()->route('groups.index'); 
        }
        
        $tmp = File::find($dl->id)->first();

        if (!$tmp){
            return redirect()->route('groups.index'); 
        }

        return \Storage::download($tmp->file_path, $tmp->name);
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
        //
    }
}
