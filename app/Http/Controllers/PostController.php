<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\storerequest;

class PostController extends Controller
{  

    /**
     * Display the data  */ 
    public function show()
    {   
        $data = Post::all();
        return view('post',['posts'=>$data]);
    }
    
    
    /*create a new post 
    */
    public function store(storerequest $request)
    {  

        //custom validation for store
       /**
        *  $request->validate([
            'title' =>'required|max:40',
            'excerpt' =>'required|max:40|alpha',
            'body' =>'required|max:300',
        ],['title.required' =>'Title is a mandatory parameter','excerpt.required' =>'Author name is a mandatory parameter','excerpt.max' =>'Author name cannot be more than 40','excerpt.alpha' =>'Author name cannot be numeric']);
        
        */
        $validatedData = $request->validated();   

        $post = new Post;
        $post->title = $request->title; 
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;   
        
        /** */
       
        $post->save();
       // Post::create($request->all());
        return redirect('post')->with('created','Post has been created successfully');
       
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect('post')->with('deleted','Post has been deleted successfully');
        
    }

    public function edit($id)

    {
        $post=Post::findorfail($id);
        return view('edit',['post'=>$post]);
    }

    public function update(storerequest $request,$id)
        {    
            //Validation in controller
            /** $request->validate([
            'title' =>'required|max:40',
            'excerpt' =>'required|max:40|alpha',
            'body' =>'required|max:300',
        ],['title.required' =>'Title is a mandatory parameter','excerpt.required' =>'Author name is a mandatory parameter','excerpt.max' =>'Author name cannot be more than 40','excerpt.alpha' =>'Author name cannot be numeric']);
         */
        $validatedData = $request->validated();   

            $post=Post::findorfail($id);
            $post->title = $request->get('title');
            $post->excerpt = $request->get('excerpt');
            $post->body = $request->get('body');
            $post->save(); 

            return redirect('post')->with('updated','Post has been updated successfully');

            
        }

}
