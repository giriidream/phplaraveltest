<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\student_details;
use App\Http\Controllers\DeleteData;
use Illuminate\Support\Facades\Validator;

class DeleteData extends Controller
{
   public function delete(Request $req)
   {
      $valid= Validator::make($req->all(),[
        'id'=>'required'
       
       ]);
      if($valid->fails())
      {
        return response()->json(['errors'=>$valid->errors()],401);
      }
      else
      {
         $id = $req->id;
         $data= student_details::find($id);
         $result=$data->delete();
         if($result)
         {
            return ["result"=>" Data is deleted"];
         }
         else
         {
            return ["result"=>"data is not delete "];
         }
      
        }
    }
}
?>
