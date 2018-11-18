<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupAccess;
use App\GroupMembers;
use App\User;

class GroupAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!\Auth::check()){
            return view('auth.register');
        }
        
        // $data['groups'] = GroupAccess::where('user_id', '=', (int) (\Auth::id()))->get();
        $data['groups'] = GroupMembers
            ::where('group_members.user_id', '=', (int) (\Auth::id()))
            ->join('groupAccess', 'groupAccess.group_id', '=', 'group_members.group_id')
            ->get();
        // return $data;
        // $data['groups'] = GroupAccess::all(); // currently it has my id as a string in the database lmao.
        $data['users'] = User::all();
        $data['count'] = $data['groups']->count();
        return view('groups.index')->with('data', $data);
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
            return view('auth.register');
        }

        \DB::beginTransaction();

        $tmp = new GroupAccess;
        $tmp->name = $request->group_name;
        $tmp->user_id = \Auth::id();
        $tmp->save();

        $gmList = $request->item_id;

        // if list is countable go through and add file.
        if ($gmList){
            for ($i=0; $i < count($gmList); $i++){
            
                $gm = new GroupMembers;
                // if ($gmList[$i] != \Auth::id()){
                $gm->user_id = $gmList[$i];
                $gm->group_id = $tmp->id; 
                $gm->save();
                // }
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
