<?php

namespace App\Http\Controllers;
use App\Models\SignupModel;
use App\Models\PostsModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Hash;
use Session;

class SignupController extends Controller
{
    public function signup(Request $request)
    {
        //($request->all());
        // return $request->all();
        $validator = Validator::make($request -> all(),[
            'name1' => ['required'],
            'email1' => ['required','email'],
            'password'         => ['required'],
            'password_confirm' => ['required','same:password'] 
         ]);
         if($validator->fails()){
            $errors = $validator->errors();
            return response()->json([
                'status' => '403',
                'message' => $errors
            ]);
         }

        $signup = new SignupModel();
        $signup->name = $request->name1;
        $signup->email = $request->email1;
        $signup->password =  Hash::make($request->password);
        $signup->save();
        return response()->json([
            'status' => '200',
            'message' => 'users has been added successfully',
            'signupid' => $signup->id
        ]);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request -> all(),[
            'name' => ['required'],
            'email' => ['required','email']
         ]); 
         if($validator->fails()){
            $errors = $validator->errors();
            return response()->json([
                'status' => '403',
                'message' => $errors
            ]);
         }
         $login = SignupModel::where('email',$request->email)->first();
         if(!empty($login))
         {
            if(Hash::check($request->password, $login->password)){
                Session::put("email",$login->email);
                Session::put("loginid",$login->id);

                return response()->json([
                    'status' => '200',
                    'message' => 'You Have Been Login Successfully',
                    'login_id' => $login->id
                ]);
            } 
            else {
                return response()->json([
                    'status' => '403',
                    'message' => 'Password is incorrect',
                    'loginid' => $login->id
                ]);  
            }
         }
         else {
            return response()->json([
                'status' => '403',
                'message' => 'Login Details Does not matched with the data'
            ]);
         }  
       
    }
    public function createpost(Request $request)
    {
      
            $validator = Validator::make($request -> all(),[
                'title' => ['required'],
                'sub_title' => ['required'],
                'tags'         => ['required'],
                'content' => ['required'],
                'login_id' => ['required']
             ]);
             if($validator->fails()){
                $errors = $validator->errors();
                return response()->json([
                    'status' => '403',
                    'message' => $errors
                ]);
             } 
             else {
                $login = SignupModel::where('id',$request->login_id)->first();
                if(!empty($login))
                {
                    $posts = new PostsModel();
                    $posts->title = $request->title;
                    $posts->sub_title = $request->sub_title;
                    $posts->tags = $request->tags;
                    $posts->content = $request->content;
                    $posts->login_id = $request->login_id;
                    $posts->save();
                    return response()->json([
                        'status' => '200',
                        'message' => 'Post Added Successfully',
                        'postsid' => $posts->id
                    ]);  
                }
                else
                {
                    return response()->json([
                        'status' => '403',
                        'message' => 'PLease first register'
                    ]);
                }
             } 
        
    }
    public function updatepost(Request $request)
    {
        $validator = Validator::make($request -> all(),[
            'title' => ['required'],
            'sub_title' => ['required'],
            'tags'         => ['required'],
            'content' => ['required'],
            'login_id' => ['required'],
         ]);
         if($validator->fails()){
            $errors = $validator->errors();
            return response()->json([
                'status' => '403',
                'message' => $errors
            ]);
         }
         else {
            $login = SignupModel::where('id',$request->login_id)->first();
            if(!empty($login))
            {
                $posts = PostsModel::where('id',$request->postsid)->where('login_id',$request->login_id)->first();
                $posts->title = $request->title;
                $posts->sub_title = $request->sub_title;
                $posts->tags = $request->tags;
                $posts->content = $request->content;
                $posts->login_id = $request->login_id;
                $posts->save();
                return response()->json([
                    'status' => '200',
                    'message' => 'Post has been updated',
                    'postsid' => $posts->id
                ]);  
            }
            else {
                return response()->json([
                    'status' => '403',
                    'message' => 'PLease first register'
                ]);
            }
         }
         
    } 
    public function deletepost(Request $request)
    {
        
       
            $login = SignupModel::where('id',$request->login_id)->first();
            if(!empty($login))
            {
                $posts = PostsModel::where('id',$request->id)->where('login_id',$request->login_id)->delete();
               
                return response()->json([
                    'status' => '200',
                    'message' => 'Post has been deleted',
                ]);  
            }
            else {
                return response()->json([
                    'status' => '403',
                    'message' => 'PLease first register'
                ]);
            }
         
    }
    public function getposttag(Request $request)
    {
        $login = SignupModel::where('id',$request->login_id)->first();
            if(!empty($login))
            {
                $posts = PostsModel::where('tags',$request->tags)->where('login_id',$request->login_id)->get();
                return response()->json([
                    'status' => '200',
                    'message' => 'Post data',
                    'postdata' => $posts
                ]);  
            }
            else {
                return response()->json([
                    'status' => '403',
                    'message' => 'PLease first register'
                ]);
            }
    }
    public function getallpost(Request $request)
    {
        $login = SignupModel::where('id',$request->login_id)->first();
        if(!empty($login))
        {
            $posts = PostsModel::where('login_id',$request->login_id)->get();
            return response()->json([
                'status' => '200',
                'message' => 'Post data',
                'postdata' => $posts
            ]);  
        }
        else {
            return response()->json([
                'status' => '403',
                'message' => 'PLease first register'
            ]);
        }
    }
    
}
