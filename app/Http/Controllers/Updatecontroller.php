<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Updatecontroller;
use App\Models\student_details;
use Illuminate\Support\Facades\Validator;

class Updatecontroller extends Controller
{
   
    public function update(Request $req)
    {
        $valid= Validator::make($req->all(),[
            's_name'=>'required',
            's_email'=>'required|email',
            's_number'=>'required|regex:/^[0-9]{10}$/',
            's_add'=>'required|max:200'
        ]);
        if($valid->fails())
        {
          return response()->json(['errors'=>$valid->errors()],401);
        }
        else
        {
        $data=student_details::find($req->id);
        if($data)
        {
            $data->s_name = $req->s_name;
            $data->s_add = $req->s_add;
            $data->s_number = $req->s_number;
            $data->s_email = $req->s_email;        
            $result= $data->save();

            if($result)
            {
                return ['status' => 200, 'data'=> 'success', 'message' => 'Data updated successfully.'];
            }
            else
            {
                return ['status' => 400, 'data'=> 'failed', 'message' => 'Data not updated.'];
            }
        }
        else{
            return ['status' => 404, 'data'=> 'failed', 'message' => 'Id does not exist.'];
        }
        }
     }
}
?>