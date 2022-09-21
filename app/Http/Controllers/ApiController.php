<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Validator;
use App\Models\Partner;
use App\Models\origin;
use App\Models\Events_Name;
use App\Models\Events_Type;
use App\Models\Events;
use App\Models\Source;
use App\Models\SaveData;


class ApiController extends Controller
{
    public function insert(Request $req){ 
        // start there validation api
        $valid= Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|email',
            
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
     
                       

      }

//  public function finddata(Request $req)
//  {
          
//                 $valid= Validator::make($req->all(),[
//                 'id'=>'required'
               
//                 ]);
//                  if($valid->fails())
//                 {
//                  return response()->json(['status' => 422, 'data'=> $valid->errors(), 'message' => 'Invalid Attributes.']);
//                 }
//                 else
//                 {
//                 $id = $req->id;
//                 $data =  partner::where("id",$id)->get();
//                 $count = count($data);
//                 if($count>0)
//                 {
//                     return response()->json(['status' => 200, 'data'=> $data, 'message' => 'Data get successfully.']);
//                 }
//                 else{
//                     return response()->json(['status' => 404, 'data'=> $data, 'message' => 'Data not found.']);
//                 }
          
//             }
//         }
    
        




        //start there validation api
//         $valid= Validator::make($req->all(),[
//             'sumsung'=>'required',
//             'vivo'=>'required',
//             'apple'=>'required'
//         ]);

//         if($valid->fails())
//         {
//           return response()->json(['errors'=>$valid->errors()],401);
//         }
//         else
//            {
//             $item = new partners;
//             $item->sumsung = $req->sumsung;
//             $item->vivo = $req->vivo;
//             $item->apple = $req->apple;
//             $item->save();
//             if($item->save())
//             {        
//                 return ['status' => 200, 'data'=> 'success', 'message' => 'Data insert successfully.'];
//             }
//             else
//             {
//                 return ['status' => 400, 'data'=> 'failed', 'message' => 'Data not insert successfully.'];
//             }
        
//           }  
//         } 
// }
// //   //  
// //     ///start there validation api
        
// //         //     $result = new events_type;
// //         //     $result->api_call = $req->api_call;
// //         //     $result->button_click = $req->button_click;
// //         //     $result->url_redirect = $req->page_open;
// //         //     $result->dropdown = $req->dropdown;
            
// //         //     $result->save();
// //         //     if($result->save())
// //         //     {        
// //         //         return ['status' => 200, 'data'=> 'success', 'message' => 'Data insert successfully.'];
// //         //     }
// //         //     else
// //         //     {
// //         //         return ['status' => 400, 'data'=> 'failed', 'message' => 'Data not insert successfully.'];
// //         //     }
            
        