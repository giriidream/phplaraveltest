<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\SaveData;
use Illuminate\Http\Request;


class Save extends Controller
{
    public function Savadata(Request $req)
    {
          $valid= Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required',
        ]);

        if($valid->fails())
        {
          return response()->json(['errors'=>$valid->errors()],401);
        }
        else
           {
            $item = new SaveData;
            $item->name = $req->name;
            $item->email = $req->email;
            $item->save();
            if($item->save())
            {        
                return ['status' => 200, 'data'=> 'success', 'message' => 'Data insert successfully.'];
            }
            else
            {
                return ['status' => 400, 'data'=> 'failed', 'message' => 'Data not insert successfully.'];
            }
        
          }  
        


    }
}
