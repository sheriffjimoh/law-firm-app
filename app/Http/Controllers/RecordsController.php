<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use Excel;
use App\Models\Client_record;
use App\Mail\RecordCreationMail;
use App\Mail\NotificationMail;
class RecordsController extends Controller
{
    

    function index()
    {
     $data = DB::table('client_records')->orderBy('id', 'DESC')->get();
     return view('welcome', compact('data'));
    }

    

    public function create_records(Request $request)
    {
       if ($request->all()) {

        $client_id ='CA'.rand(456753, 677463);

        $data = [
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'email' => $request->input('email'),
            'dob' => $request->input('dob'),
            'client_id'=> $client_id,
            'legal_counsel' => $request->input('legal'),
            'case_details' => $request->input('casedesc') ];
              $details = [
                                'firstname' =>$request->input('firstname'),
                            ];

            if (Client_record::create($data)) {
            Mail::to($request->input('email'))->send(new RecordCreationMail($details));
                if (!Mail::failures()) {
                  return response()->json(['msg'=>'record created successful','data'=>$request->all(),
                   'status' => 200] );  
                }else{
                    return response()->json(['msg'=>'record created but unable to send mail',
                  'status' => 404] );  
                }
            
            }else{
                return response()->json(['msg'=>'something went wrong','data'=>$request->all(),
            'status' => 404] );
            }
          
           
       }
    }
  

      public function single_record($value='')
      {
        $data = Client_record::where('client_id', $value)->first();
          return view('single-record', compact('data'));

      }



      public function updateimage(Request $request)
      {
        if ($request->hasFile('file')) {
          $filetypeallowed = array('png','jpg','jpeg');
          if (!in_array($request->file->extension(), $filetypeallowed)) {
           return redirect()->back()->with('error', 'only images of type png, jpg and jpeg are allow');                
         }else{
            $extension = $request->file->extension();
            $filename =  $request->input('client_id').'.'.$extension;
            $path = $request->file->storeAs('public/images', $filename);
            $update_record =Client_record::where('client_id', $request->input('client_id'))->update(
            ['profile_pic' => $filename]);
            if ($update_record) {
            return redirect()->back();
           }

        }
      }
    }



    public function CheckForprofilepic()
    {
        $data = Client_record::where('profile_pic', null)->get();
       
        foreach ($data as $value) {

            $details = ['firstname'=>$value->first_name];
            Mail::to($value->email)->send(new NotificationMail($details));
                if (!Mail::failures()) {
                 $message =  'sent';
                }else{
                    $message = 'not send';
                }
        }

        return $message;

    }


}
