<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilesController;
use App\User;
use App\File;
use App\Owns;
use App\IndividualAccess;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
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

        //validation start
        $rules = [];
        $rules['name'] = 'required|string|max:16';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user){
            return redirect()->route('users.index');
        }

        return view('users.show')->with('user', $user);
    }

    public function changePassword(Request $request){

        if (!(\Hash::check($request->get('current-password'), \Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = \Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

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

    public function delete(){
        
        if (!\Auth::check()){
            return redirect()->route('files.index');
        }

        // Account -> Auth::id()
        // hasMultipleFiles -> $file->id
        // files I shared - needs to be removed with: $ia->file_id, Auth::id()
        // files shared with me - needs to removed with $ia->user_id, Auth::id()
        // files i own - neesd to removed with: $owns->file_id, Auth::id()
        
        // delete all files
        // delete all owns
        // delete all individual access 
        // delete account

        $data = Owns
            ::where('owns.user_id', '=', \Auth::id())
            ->join('file', 'owns.file_id', '=', 'file.id')
            ->join("individualAccess", 'file.id', '=', 'individualAccess.file_id')
            ->get();

        if ($data){
            \DB::beginTransaction();

            // revoke access from other users to my files
            foreach($data as $d){
                // $deletedRows = IndividualAccess::where('file_id', '=', (int) $d->file_id)->get();
                $deletedRows = IndividualAccess::where('file_id', '=', (int) $d->file_id)->delete();
            }

            // delete all files i own
            foreach($data as $d){
                
                // $deletedRows = File::where('id', '=', $d->id)->get();
                $deletedRows = File::where('id', '=', $d->file_id)->delete();
                \Storage::delete($d->file_path);
            }

            // delete all owns i own
            foreach ($data as $d){
                // $deletedRows = Owns::where('user_id', '=', \Auth::id())->get();
                $deletedRows = Owns::where('user_id', '=', \Auth::id())->delete();
            }

            // get model of user for deletion
            $user_id = User::find(\Auth::id())->delete();
            \DB::commit();
            
        } 

        return redirect()->action('FilesController@vault');
    }

    public function friendShare(){
        return view('users.friendShare');
    }

    public function friendShareProcess(Request $request){
        return redirect('sendhtmlemail/'.$request->email);

    }
}
