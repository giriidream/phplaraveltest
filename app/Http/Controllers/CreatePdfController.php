<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CreatePdfController;
use Illuminate\Http\Request;
use App\Models\Employee;
use Validator;

use DB;
use PDF;

class CreatePdfController extends Controller
{
    public function pdfForm(Request $request)
    
    {
        $validator = Validator::make($request->all() , ['title' => 'required', 'date' => 'required','partner_name' => 'required']);
       
          if ($validator->fails())
        {
            return response()->json([
                'message' => $validator->errors()
            ], 422);
        }
        else{
            $input = $request->all();
            array_walk_recursive($input, function (&$item)
            {
                $item = strval($item);
            });
            $data = json_encode($input);
            $data1 = json_decode($data, true);
            // print_r($data1); die;
            // $pdf = PDF::loadView('vivo', $data1);
            // return $pdf->save('vivo.pdf');
            if($data1['partner_name']== 'vivo')
             {
                $bladefile='vivo'; 
           }
           elseif($data1['partner_name'] == 'oppo'){
                   $bladefile='oppo'; 
               }
            $year = date('Y');
            $monthdate = date('m');
            $currentdate = date('d');
            $partner_name = $data1['partner_name'];
            $dt=date('Y_m_d_H_i_s');
           
            $filename = uniqid();
            $path = "uploads/$partner_name/$year/$monthdate/$currentdate";
            $fileName2 = "uploads/$partner_name/$year/$monthdate/$currentdate/$partner_name-$dt.pdf";
            if(!is_dir($path)){
            mkdir($path,0777,true);
          }
            $pdf = PDF::loadView($bladefile,$data1);
            $pdf->save(public_path().'/'.$fileName2);
            //  return $finalurl="http://localhost/curdprojects/public/$fileName2";
            return response()->json([
                'result' => "http://localhost/curdprojects/public/$fileName2",
                'message'=>"saved"

            ], 200);        
        }
       
        // $products = DB::table("PDF")->get();
        // view()->share('PDF',$products);       
        //       if($request->has('download')){
        //         $pdf = PDF::loadView('testPDF');
        //         return $pdf->download('tutsmake.pdf');
        //   }
        // return view('pdf_view',['PDF'=>$products]);
    }
}
