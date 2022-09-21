<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\event;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\KeyController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
date_default_timezone_set("Asia/Kolkata");

class KeyController extends Controller
{
    
    public function savedata( Request $req)
 {
     
    $valid= Validator::make($req->all(),[
        'request_key'=>'required',
        'events_type'=>'required',
        'source'=>'required',
        'partner'=>'required',
        'origin'=>'required',
        'event_name'=>'required',
        'state'=>'required'
    ]);
    if($valid->fails())
    {
      return response()->json(['errors'=>$valid->errors()],401);
    }
    else
     {
        $item = new event;
        $item->request_key = $req->request_key;
        $item->events_type = $req->events_type;
        $item->source = $req->source;
        $item->partner = $req->partner;
        $item->origin = $req->origin;
        $item->event_name = $req->event_name;
        $item->state = $req->state;
     
        $result= $item->save();
        if($result)
        {        
            return ['status' => 200, 'data'=> 'success', 'message' => 'Data stored successfully.'];
        }
        else
        {
            return ['status' => 400, 'data'=> 'failed', 'message' => 'Data not stored successfully.'];
        }
  }

} 
public function SendOtp(Request $request)
    {
   
       function Textlocal()
       {
       
       $input = $request->all();
       $phone = $input['mobile'];
      
     
        $receipientno = '91' . $phone;
        $apiKey = "ViLaoKQr1Mw-GN8EntRmcC868qcQcMDypdCps7GP2m";
        //$count = mt_rand(9999, 100000);
        $count = mt_rand(1111, 9999);
        $sender = "DMIFIN";
        $message = "your test otp is" . $count;
        $data = array('apikey' => $apiKey, 'numbers' => $receipientno, "sender" => $sender, "message" => $message);
          
        $ch = curl_init('https://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $buffer = curl_exec($ch);
        $otp = json_decode($buffer,true);
    
        
        $textlocal = \DB::table('mobile_otp')->where(['phone'=>$phone, 'status'=>0])->count();
        if($textlocal>0)
        {
            \DB::table('mobile_otp')->where(['phone'=>$phone, 'status'=>0])->update(['otp'=>$count]); 
        } 
        else {
            \DB::table('mobile_otp')->insert(['phone'=>$phone, 'otp'=>$count, 'status'=>'0']);
        }
        $response()->textlocal()->json(['Data'=>$phone,'status'=>0, "message" =>'OTP has been sent, please check your phone']);
          
     }

    }
}



   
       
 


