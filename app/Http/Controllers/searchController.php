<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\student_details;
use App\Http\Controllers\searchController;
use Illuminate\Support\Facades\Validator;

class searchController extends Controller
{
    public function search(Request $req)
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
        return student_details::where("id",$id)->get();
    }
}
}
?>