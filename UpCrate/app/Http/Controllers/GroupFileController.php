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
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

        // validation begins

        $input = $request->all();
        $input['new_file'] = $request->file('new_file'); // cache the file

        $rules = [];
        $rules['new_file'] = 'required|max:2048';
        
        if (in_array("item_id", $input)){
            foreach($input['item_id'] as $key => $val){
                $rules[$key] = 'required|exists:groupAccess.name';
            }
        } else {
            $notification = array(
                'message' => "Group Files can't be uploaded without a group!",
                'alert-type' => 'error'
              );
            return back()->with($notification);
        }
        
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
  			$notification = array(
                'message' => $validator->messages()->first(),
                'alert-type' => 'error'
              );
            return back()->with($notification);
        }

        // validation ends 

        \DB::beginTransaction();
        
        $file = new File;
        
        $tmp = $input['new_file'];
        if (!$tmp){
            \DB::rollbackTransaction();
            \DB::commit();
            return redirect()->route('groups.index'); 
        }

        // generate a new filename. getClientOriginalExtension() for the file extension
        $file->name = $tmp->getClientOriginalName();
        $file->file_path = $tmp->storeAs('files', $file->name . time());
        $file->visibility = 0; // groupFiles are always private

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

        $dl = File
            ::where('file.id','=', $id)
            ->join('groupFile', 'file.id', '=', 'groupFile.file_id')
            ->join('group_members', 'group_members.group_id', '=', 'groupFile.group_id')
            ->where('group_members.user_id', '=', \Auth::id())
            ->get()->first();
        
        if (!$dl){
            $notification = array(
                'message' => "You do not have the correct privileges to download this file.",
                'alert-type' => 'info'
            );
            return back()->with($notification); // TODO causes redirects
        }
   
        return \Storage::download($dl->file_path, $dl->name);
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
