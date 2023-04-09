<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Post;
use  App\Models\User;
use  App\Models\Comment;
class PostController extends Controller
{
    public function index()
    {
        //select * from posts return object
        $allPosts = Post::paginate(5);
        //dd($allPosts);
        return view('posts.index', ['posts' => $allPosts]);
    }

    //Show Post Details
    public function show($id)
    {
        
        $post= Post::find($id);
        //show first result match
        //$post=Post::where('title','laravel')->first();
        //show all posts with title laravel
        //$post=Post::where('title','laravel')->get();

        return view('posts.show', ['post' => $post]);

        //return view('posts.show', ['post' => $allPosts[$id - 1]]);
    }

    //Create Form
    public function create()
    {
        $users=User::all();
        return view('posts.create',[
            'users'=>$users
        ]);
    }

    // store
        //to catch all data from form
        //$data=request()->all();
        //to catch specific field data from form
        //$title=request()->title;
    public function store(Request $request)
    {
          
        $data= $request->all();
        Post::create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'user_id'=>$data['post_creater'],
        ]);
        return redirect()->route('posts.index');

        
        //insert into posts using model class--->insert posts table

        


    }

    //Edit Form
    public function edit($id)
    {
        $post= Post::find($id);
        $users=User::all();
        return view('posts.edit', ['post' => $post,'users'=>$users]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $post= Post::find($id);
        $post->title = $request->post('title');
        $post->description = $request->post('description');
        $post->user_id     = $request->post('post_creater');
        // $post->update([
        //     'title'=>$post['title'],
        //     'description'=>$post['description'],
        //     'user_id'=>$post['post_creater'],

        // ]);
        $post->save();
        return redirect()->route('posts.index');
    }

    //Delete
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
// getting comments for a sample post...

    //add comment
    public function addComment($post){
        $singlePost = Post::find($post);
        if($singlePost){
            $singlePost->comments()->create([
                'body'=>request()->body,
                'commentable_id'=>$post,
            ]);
        }
        return back();

        //return to_route('posts.show',['post'=>$id]);
    }
}