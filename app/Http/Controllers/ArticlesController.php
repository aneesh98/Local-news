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
        $post->comments=array();
        $post->save();
        return redirect('dashboard')->with('success','Post created succesfully');
    }
    public function postnewsui()
    {
        return view('posts.postnews');
    }

    public function viewposts()
    {   $articles=Articles::all();
        foreach($articles as $elem)
        {
            $data=User::where('_id','=',$elem->userid)->get();
            $elem->username=$data[0]->username;
        }
       // return $articles;
        return view('posts.viewposts')->with('posts',$articles);
    }
    public function displayPost($id)
    {
        $article=Articles::find($id);
      
        return view('posts.displaypost')->with('article',$article);
    }
    public function comments(Request $request,$id)
    {
        $article=Articles::find($id);
        $comment=["username"=>Session::get('userdetail')->username,"comment"=>$request->comment];
        $arr=$article->comments;
        array_push($arr,$comment);
        $article->comments=$arr;
      }
    public function deleteArticle($id)
    {
        $article=Articles::find($id);
        $article->delete();
        return redirect('/dashboard');
    }
}
