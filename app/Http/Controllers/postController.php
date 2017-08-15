<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User, App\Post, App\User_Food_List;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Redirect, Input, Auth;


class postController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::get();

        return view('posts.home_post')
            ->with('posts', $posts);
    }
    public function compare()
    {

        $posts = User_Food_list::OrderBy('username', 'desc')-> get();
        $user = User:: get();



          //  return $posts;  
        return view('compare')
            ->with('food_details', $posts)
            ->with('users', $user);
    }
    public function compareuser($id)
    {

        $posts = User_Food_list::OrderBy('username', 'desc')-> get();
        $user = User:: get();



          //  return $posts;  
        return view('compareuser')
            ->with('food_details', $posts)
            ->with('users', $user)
            ->with('id1', $id)


            ;
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $rules = [
            'post'   => 'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $post = new Post();
            $post->username = Auth::user()->name;
            $post->user_id = Auth::user()->_id;
            $post->post = $data['post'];
            $post->posttitle = $data['posttitle'];


            if($post->save()){
                return redirect()->route('blog')
                    ->with('success', 'posted successfully');
            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'failed to post!');
            }
        } 
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('posts.edit_post')
                ->with('post', $post);    
    }

    public function update(Request $request, $id){
        $rules = [
            'post'   => 'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $post = Post::findOrFail($id);
            $post->post = $data['post'];

            if($post->save()){
                return redirect()->route('blog')
                    ->with('success', 'post updated successfully');
            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'failed to update post!');
            }
        }
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        
        if($post->delete()){
            return redirect()->route('blog')
                ->with('error', 'posted deleted successfully');
        }else{
            return redirect()->back()
                ->withInput()
                ->with('error', 'failed to delete post!');
        }
    }
        public function upvote($id){

        $post = Post::findOrFail($id);

        $upvote = Auth::user()->_id;

        $flag = '1';

        for($i = 0; $i < count($post->downvotes); $i++){
        if($post->downvotes[$i]==$upvote)
            {
                $flag = '0';
                $downvote = $post->downvotes[$i];
            }
            
        }

        if($flag=='1'){

            if($post->push('upvotes', $upvote,true))
                {
                    return redirect()->back()
                            ->with('success', 'upvoted successfully');
                }
            else
                {
                    $post->pull('upvotes', $upvote);
                    return redirect()->back()
                            ->with('success', 'upvoted successfully');
                }
            }
        else
        {
            $post->pull('downvotes', $downvote);

            if($post->push('upvotes', $upvote,true))
                {
                    return redirect()->back()
                            ->with('success', 'upvoted successfully');
                }
            else
                {
                    $post->pull('upvotes', $upvote);
                    return redirect()->back()
                            ->with('success', 'upvoted successfully');
                }


        }



        // if($post->push('upvotes', $upvote,true))
        // {
        //     return redirect()->back()
        //             ->with('success', 'upvoted successfully');
        // }
        // else
        // {
        //     $post->pull('upvotes', $upvote);
        //     return redirect()->back()
        //             ->with('success', 'upvoted successfully');
        // }

       // if($post->push('upvotes', $upvote,true)){
       //          return redirect()->back()
       //              ->with('success', 'upvoted successfully');
       //      }else{
       //          return redirect()->back()
       //              ->withInput()
       //              ->with('error', 'failed to upvote!');
       //      }


    }

    public function downvote($id){

        $post = Post::findOrFail($id);

        $downvote = Auth::user()->_id;
        $flag = '1';

        for($i = 0; $i < count($post->upvotes); $i++){
        if($post->upvotes[$i]==$downvote)
            {
                $flag = '0';
                $upvote = $post->upvotes[$i];
            }
            
        }

        if($flag=='1'){

            if($post->push('downvotes', $downvote,true))
                {
                    return redirect()->back()
                            ->with('success', 'downvoted successfully');
                }
            else
                {
                    $post->pull('downvotes', $downvote);
                    return redirect()->back()
                            ->with('success', 'downvoted successfully');
                }
            }
        else
        {
            $post->pull('upvotes', $upvote);

            if($post->push('downvotes', $downvote,true))
                {
                    return redirect()->back()
                            ->with('success', 'downvoted successfully');
                }
            else
                {
                    $post->pull('downvotes', $downvote);
                    return redirect()->back()
                            ->with('success', 'downvoted successfully');
                }
        }

    }
    public function comment(Request $request, $id){
        $rules = [
            'comment'   =>  'required'
        ];

        $data = $request->all();
        
        $validation = Validator::make($data, $rules);
        
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $post = Post::findOrFail($id);
            $comment = [
                'comment'   =>  $data['comment'],
                'user'      =>  [
                                    '_id' => Auth::user()->_id,
                                    'name'=> Auth::user()->name
                                ],
                'created_at' => (new \DateTime())
                ];

            if($post->push('comments', $comment)){
                return redirect()->back()
                    ->with('success', 'commented successfully');
            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'failed to comment!');
            }
        }
    }

     public function viewblog($id){

        $post = Post::findOrFail($id);

        return view('posts.details')->with('post',$post);
    }

}
