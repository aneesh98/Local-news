<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Articles;
class ArticlesController extends Controller
{
    public function StorePost(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
        $post=new Articles;
        $post->userid=Session::get('userdetail')->_id;
        $post->title=$request->input('title');
        $post->text=$request->input('body');
        $post->save();
        return redirect('dashboard')->with('success','Post created succesfully');
    }
    public function postnewsui()
    {
        return view('posts.postnews');
    }

    public function viewposts()
    {   $articles=Articles::where('userid','=',Session::get('userdetail')->_id)->get();
        // /return $articles;
        return view('posts.viewposts')->with('posts',$articles);
    }
    public function displayPost($id)
    {
        $article=Articles::find($id);
        return view('posts.displaypost')->with('article',$article);
    }
}
