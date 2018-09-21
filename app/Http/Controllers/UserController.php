<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
//use Intervention\Image\ImageServiceProvider;
use Image;
use App\User;
class UserController extends Controller
{
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
        $car->save();
        return redirect('car')->with('success', 'User has been successfully added');
    }
    public function index()
    {
        $cars=User::all();
        return view('carindex',compact('cars'));
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
    {
        $user=User::where('email','=',$request->get('email'))->get();
        if(sizeof($user)!=0)
        {if(Hash::check($request->get('password'), $user[0]->password))
        {return $user;}
        else{return null;}}
        else{
            return "USer is not exist";
        }
        //return $user;
    }
    public function login()
    {
        return view('loginpage');
    }
}
