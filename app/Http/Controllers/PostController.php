<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Category;
use App\Post;
use App\User;
use App\Tag;

class PostController extends Controller
{
    //
    function index(){
        // $posts = DB::select('SELECT * FROM posts');
        // $posts = DB::table('posts')->orderBy('id','DESC')->get();
        $posts = Post::orderBy('id','DESC')->get();
        // return view('post.index',['posts'=>$posts]);
        // return view('post.index')->with(['posts'=>$posts]);
        return view('post.index',compact('posts'));
    }
    function create(){
        $categories = Category::get();
        // $categories = \App\Category::get();
        // return $categories;
        return view('post.create',compact('categories'));
    }
    function store(Request $request){



        // return $request->file('cover');
        // return $request->file('cover')->store('test','public');
        // return $request->file('cover')->storeAs('test','qqq.jpg','public');
        // return $request->file('cover')->storeAs('test','123.jpg');
        if($request->file('cover')){
            $ext = $request->file('cover')->getClientOriginalExtension();
            $cover = Str::uuid().'.'.$ext;
            $request->file('cover')->storeAs('images',$cover,'public');
            // return;
        }
        // DB::insert('INSERT INTO posts(title,content,created_at,updated_at)VALUES(?,?,?,?)',[
        //     $request->title,
        //     $request->content,
        //     now(),
        //     now()
        // ]);
        // DB::table('posts')->insert([
        //     'title'     => $request->title,
        //     'content'   => $request->content,
        //     'category_id'=>$request->category_id,
        //     'created_at'=> now(),
        //     'updated_at'=> now()
        // ]);

        $request->validate([
            'title' => 'required',
            'content'=> 'required'
        ]);


        $post = new Post;
        $post->fill($request->all());
        $post->category_id = $request->category_id;
        $post->cover = $cover;
        $post->user_id = Auth::id();
        $post->save();

        // 標籤
        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagModel = Tag::firstOrCreate(['title' => $tag]);
            $post->tags()->attach($tagModel->id);
        }

        return redirect('post');

    }
    function show($id){
        // $posts = DB::select('SELECT * FROM posts WHERE id ='.$id);
        // $post = DB::table('posts')->where('id',$id)->first();
        // $post = DB::table('posts')->find($id);
        $post = Post::findOrFail($id);
        return view('post.show',compact('post'));
    }
    function edit($id){
        // $post = DB::table('posts')->find($id);
        $post = Post::find($id);
        $categories = Category::get();
        return view('post.edit',compact('post','categories'));
    }
    function update(Post $post,Request $request){
        // DB::update('UPDATE posts SET title=?,content=?,updated_at=? WHERE id = ?' ,[
        //     $request->title,
        //     $request->content,
        //     now(),
        //     $id
        // ]);
        // DB::table('posts')->where('id',$id)->update([
        //     'title'     => $request->title,
        //     'content'   => $request->content,
        //     'updated_at'=>now()
        // ]);
        $post->fill($request->all());
        $post->category_id = $request->category_id;
        $post->save();
        return redirect('post');
    }
    function destroy($id){
        // DB::delete('DELETE FROM posts WHERE id = ?',[$id]);
        DB::table('posts')->where('id',$id)->delete();
        return redirect('post');
    }
    function postWithCategory(Category $category){
        $posts = Post::where('category_id',$category->id)->orderBy('updated_at','DESC')->get();
        // return $category;
        return view('post.postCategory',compact('posts','category'));
    }
    function postWithUser(User $user){
        $posts = Post::where('user_id',$user->id)->orderBy('updated_at','DESC')->get();
        return view('post.postUser',compact('posts','user'));
    }
}
