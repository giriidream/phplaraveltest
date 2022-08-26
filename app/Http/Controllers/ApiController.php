<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\student_details;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
     
    function getApi()
    {
        return student_details::all();
       
    }

    public function create(Request $req)
    {   
        // start there validation api
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
            $item = new student_details;
            $item->s_name = $req->s_name;
            $item->	s_email = $req->s_email;
            $item->s_number = $req->s_number;
            $item->s_add = $req->s_add;
            
            $item->save();
            if($item->save())
            {        
                return ['status' => 200, 'data'=> 'success', 'message' => 'Data stored successfully.'];
            }
            else
            {
                return ['status' => 400, 'data'=> 'failed', 'message' => 'Data not stored successfully.'];
            }
        }
        
    }

}