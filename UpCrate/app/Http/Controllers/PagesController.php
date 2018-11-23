<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Owns;
use App\IndividualAccess;
use App\User;
use App\GroupMembers;
use App\GroupAccess;
use App\GroupFile;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to UpCrate!';
        // return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About UpCrate!';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    public function proposal(){
        return view('pages.proposal');
    }

    public function signin(){
        return view('pages.signin');
    }

    public function loading(){
        return view('pages.loading');   
    }

    public function landing(){
        
        if (!\Auth::check()){
            return view('welcome');
        }

         $data['files'] = Owns
            ::where('user_id', '=', \Auth::id())
            ->join('file', 'owns.file_id', '=', 'file.id')
            ->select('file.id', 'file.file_path', 'file.visibility', 'file.name')
            ->getQuery()
            ->get();

        // select * from File natural join IndividualAccess where userID = pm34; <-- not really anymore LMFAO
        $data['iaFiles'] = IndividualAccess
            ::where('individualAccess.user_id', '=', \Auth::id())
            ->join('file', 'individualAccess.file_id', '=', 'file.id')
            ->select('file.id', 'file.file_path', 'file.visibility', 'file.name', 'owns.user_id', 'users.name as user_name')
            ->join('owns', 'file.id', '=', 'owns.file_id')
            ->join('users', 'owns.user_id', '=', 'users.id')
            ->getQuery()
            ->get();
        
        
        // select all users but the authenticated user
        $data['users'] = User::all();
        $data['publicFiles'] = File
            ::where('visibility', '=', 1)
            ->get(); 
        
        // gets all groups i belong to
        $data['groups'] = GroupMembers
            // ::groupBy("groupFile.file_id")
            ::where('group_members.user_id', '=', \Auth::id())
            ->join('groupAccess', 'groupAccess.group_id', '=', 'group_members.group_id')
            ->leftJoin('groupFile', 'group_members.group_id', '=', 'groupFile.group_id')
            ->select('groupAccess.name as groupName', 'group_members.user_id as groupMemberID', 'groupAccess.user_id as groupOwnerID', 'groupFile.group_id as groupID', \DB::raw('GROUP_CONCAT(groupFile.file_id) AS files'))
            ->orderBy('groupFile.group_id')
            ->where('groupFile.group_id', '!=', 'null')
            // ->groupBy('group_members.user_id')
            ->groupBy('groupFile.group_id')
            // ->join('users', )
            ->get()->toArray();

        $j = 0;
        for ($i=0; $i < count($data['groups']); $i++){
            $data['groups'][$i]['files_names'] = array();
            $data['groups'][$i]['files'] = explode(",", $data['groups'][$i]['files']);
            // $ra = array();
            foreach ($data['groups'][$i]['files'] as $grpFile) {
                $ff = File::find((int)$grpFile)->select('name as file_name')->first()->file_name;
                array_push($data['groups'][$i]['files_names'], File::find($grpFile));
            }
            $j++;
        }        
        // return $data['groups'];
        
        $data['count'] = $data['files']->count();
        $data['iaCount'] = $data['iaFiles']->count();


        return view('navbar')->with('data', $data);
    }
}
