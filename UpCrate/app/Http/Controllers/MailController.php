<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\File;

class MailController extends Controller {
//    public function basic_email(){
//       $data = array('name'=>"Thavy");
   
//       Mail::send(['text'=>'mail'], $data, function($message) {
//          $message->to('thavythach@gmail.com', 'Thavy')->subject
//             ('Laravel Basic Testing Mail');
//          $message->from('UpCrate455@gmail.com','UpCrate Team');
//       });
//       echo "Basic Email Sent. Check your inbox.";
//    }
   public function html_email($email){
   	  'email' => 'required|regex:/(.*)@myemail\.com/i'
      $data = array('name'=>"New User");
      Mail::send('mail', $data, function($message) use ($email){
        
         $message->to($email, 'New User')->subject
            ('Come Register!');
         $message->from('UpCrate455@gmail.com','UpCrate Team');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
//    public function attachment_email(){
//       $data = array('name'=>"Thavy");
//     //   return $tmp; 
//       Mail::send('mail', $data, function($message) {
//          $tmp = File::find(10);
//          $message->to('thavythach@gmail.com', 'Thavy')->subject
//             ('Laravel Testing Mail with Attachment');
//          $message->attach($tmp->file_path);
//         //  $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
//          $message->from('UpCrate455@gmail.com','UpCrate Team');
//       });
//       echo "Email Sent with attachment. Check your inbox.";
//    }
}