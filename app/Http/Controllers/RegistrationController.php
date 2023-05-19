<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Registration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use DB;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('get')) {
            $country = Country::get();
            return view('registration',compact('country'));
        }
        else{
            $txtfirst = $request->txtfirst;
            $txtlast =  $request->txtlast;
            $txtcontact = $request->txtcontact;
            $txtemail = $request->txtemail;
            $txtaddress = $request->txtaddress;
            $txtcountry = $request->txtcountry;
            $txtstate = $request->txtstate;
            $txtcity = $request->txtcity;
            $txtpassword = $request->txtpassword;
            $hashedPassword = Hash::make($txtpassword);
            DB::beginTransaction();
            $mail_from=$txtemail;
          //   $myUsers = ['asifkaushar@gmail.com','abdeali@hatsoff.co.in'];
            $myUsers = 'abdeali@hatsoff.co.in';
            try{
                 DB::table('users')->insert([
                    'firstname' =>  $txtfirst,
                    'lastname'	=> $txtlast,
                    'email' => $txtemail,
                    'contactnumber' => $txtcontact,
                    'address' => $txtaddress,
                    'country' => $txtcountry,
                    'state'=>$txtstate,
                    'city'=>$txtcity,
                    'password'=>$hashedPassword
                ]);
              DB::commit();
              $data = array('emailid'=>$txtemail,'password' => $txtpassword);
              Mail::send('mail/inquiry', $data, function($message) use ($request,$mail_from) {
                  $message->to($mail_from)->subject
                     ('Registration');
                  $message->from('asifkaushar@gmail.com','Registration');
               });
            //    Mail::send('mail/replyinginquiry', $data,function($message) use ($request,$mail_from,$myUsers) {
            //       $message->to($request->emailid)->subject
            //          ('Inquiry| DCP Expeditions');
            //       $message->from($mail_from,'DCP Expeditions');
            //    });
              $body =  [
                  'success' => 200
              ];
              return response()->json($body);
            }
            catch(\Illuminate\Database\QueryException $e)
            {
              DB::rollBack();
              dd($e);
            }
        }
    }
    public function getstate(Request $request)
    {
        $state = State::where('country_id',$request->country)->get();
        $body =  [
            'responsestate' => $state,
        ];
        return response()->json($body);		
    }
    public function getcity(Request $request)
    {
        $city = City::where('state_id',$request->state)->get();
        $body =  [
            'responsecity' => $city,
        ];
        return response()->json($body);
    }
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('login');
        }
        $credentials = $request->only(['email', 'password']);
        
        if(!auth()->attempt($credentials)){
            $body =  [
                'error' => 404,
            ];
            return response()->json($body);
            // return redirect('/adminpanel')->withErrors(['error','Invalid Credentials']);
        }else{
            // $request->session()->put('customer_admin', ['email'=>$request->email]);
            $body =  [
                'success' => 200,
            ];
            return response()->json($body);
            //return view('admin.welcome');
        }
    }
    public function users(Request $request)
    {
        return view('users');
    }
    public function users_list(Request $request)
    {
        $draw = $request->get('draw');
		$start = $request->get("start");
		$rowperpage = $request->get("length"); // Rows display per page
        $users = Registration::skip($start)->take($rowperpage)->get();  
        $count = Registration::select('count(*) as allcount')->count();       
        return Datatables::of($users)
        ->with([
			"recordsTotal" => $count,
			"recordsFiltered" => $count
			])
            ->addIndexColumn()
            ->setOffset($start)
            ->addColumn('username',function($users)  {
                return $users->email;
            })
            ->addColumn('contact',function($users) {
                return $users->contactnumber;
            })
            ->addColumn('country',function($users) {
                $country = Country::where('id',$users->country)->first();

                return $country->name;
            })
            ->addColumn('state',function($users) {
                $state = State::where('id',$users->state)->first();
                return $state->state;
            })
            ->addColumn('city',function($users) {
                $city = City::where('id',$users->city)->first();
                return $city->city;
            })
            ->rawColumns(['username','contact','country','state','city'])
            ->make(true);
    }
}
