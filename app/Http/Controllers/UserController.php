<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
//use Intervention\Image\ImageServiceProv-ider;
use Image;
use App\User;
use App\Articles;
class UserController extends Controller
{   public function welcome()
    {
        if(!Session::has('userdetail'))
        {
            return view('welcomepage');
        }
        else
        {
            return redirect('dashboard');
        }
    }
    public function create()
    {
        return view('carcreate');
    }
    public function store(Request $request)
    {
        $car = new User();
        $car->username = $request->get('username');
        $car->email = $request->get('email');
        $car->password = Hash::make($request->get('password'));   
        if(!($car->password==$car->confirm))
        {
            return redirect('add')->with('error','Passwords dont match');
        }    
        if($request->hasFile('cover_image'))
        {
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            $filename=pathInfo($fileNameWithExt,PATHINFO_FILENAME);
            
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            echo ("<h1>".$extension."</h1>");
            if($extension!="jpg" && $extension!="png" && $extension!="jpeg" ){
                echo "<script>";
                echo "alert(\"Please Submit Image Only\")";
                echo "</script>";
                return redirect('add')->with('alertmessage','Upload Images Only'.$extension);
            }
            else{
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //$fileNameToStore=Image::make(Input::file('cover_image')->getRealPath())->resize(320,240);
            $path=$request->file('cover_image')->storeAs("public/cover_images",$fileNameToStore);
            }
        } 
        $car->cover_image=$fileNameToStore;
        $car->friends=array();
        $car->friend_requests_recv=array();
        $car->friend_requests_sent=array();
        $car->save();
        return redirect('car')->with('success', 'User has been successfully added');
    }
    
    public function index()
    {
        $cars=User::all();
        return view('carindex',compact('cars'));
    }
    public function returnusers()
    {
        $users=User::all();
        return view('showusers')->with('users',$users);
    }
    public function edit($id)
    {
        $car = User::find($id);
        return view('caredit',compact('car','id'));
    }
    public function destroy($id)
    {
        $car = User::find($id);
        $car->delete();
        return redirect('car')->with('success','User has been  deleted');
    }
    public function loadIndex()
    {
        return view('index');
    }
    public function sendFriendRequest($id)
    {   $id=(string)$id;
        $curruser=Session::get('userdetail');
        $arr1=$curruser->friend_requests_sent;
        array_push($arr1,$id); 
        $curruser->friend_requests_sent=$arr1;
        $requesteduser=User::find($id);
        //return $requested->_id;
        //$requesteduser=$requested[0];
        echo "<script>";
        echo "console.log('$requesteduser->email');";
        echo "</script>";
        $arr2=$requesteduser->friend_requests_recv;
        array_push($arr2,Session::get('userdetail')->_id);
        $requesteduser->friend_requests_recv=$arr2;
        $curruser->save();
        $requesteduser->save();
        return  $requesteduser;
        return response()->json([
            'success' => 'yes',
          ]);;
    }
    public function acceptFriendRequest($id)
    {   $id=(string)$id;
        $curruser=Session::get('userdetail');
        $arr1=$curruser->friend_requests_sent;
        array_push($arr1,$id); 
        $curruser->friend_requests_sent=$arr1;
        $requesteduser=User::find($id);
        //return $requested->_id;
        //$requesteduser=$requested[0];
        echo "<script>";
        echo "console.log('$requesteduser->email');";
        echo "</script>";
        $arr2=$requesteduser->friend_requests_recv;
        array_push($arr2,Session::get('userdetail')->_id);
        $requesteduser->friend_requests_recv=$arr2;
        $curruser->save();
        $requesteduser->save();
        return  $requesteduser;
        return response()->json([
            'success' => 'yes',
          ]);;
    }
    public function getuserbyid($id)
    {
        $userdetail=User::find($id);
        return $userdetail;
    }
    public function listusers()
    {
        $users=User::all();
        $arr=Session::get('userdetail')->friend_requests_sent;
        echo $arr;
        return view('userlist')->with('users',$users);
    }
    public function update(Request $request, $id)
    {
        $car= User::find($id);
        $car->username = $request->get('username');
        $car->email = $request->get('email');
       // $car->password = $request->get('password');        
        $car->save();
        return redirect('car')->with('success', 'User has been successfully update');
    }
    public function returndetails(Request $request)
    {if(!Session::has('userdetail'))
        {$user=User::where('email','=',$request->get('email'))->get();
        if(sizeof($user)!=0)
        {
            if(Hash::check($request->get('password'), $user[0]->password))
        {   
            Session::put('userdetail',$user[0]);
            return redirect('dashboard');
        }
        
    }
        else{
            return "User is not exist";
        }
    }
        
        //return $user;
    }


    public function loaddashboard()
    {
        if(Session::has('userdetail'))
        {
            return view('dashboard');
        }
        else
        {
            return redirect('login');
        }
    }
    public function login()
    {   if(!Session::has('userdetail'))
        return view('loginpage');
        else
        return redirect('dashboard');
    }
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
