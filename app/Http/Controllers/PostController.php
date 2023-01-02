<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
    public function store(Request $request)
    {  
        $request->validate([
            'title' =>'required',
            'excerpt' =>'required',
            'body' =>'required'
        ]);
        $post = new Post;
        $post->title = $request->title; 
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        
        /**  if($request->hasfile('image'))
        {
         $image = $request->file('image');
         $extension = $image->getOriginalExtension();
         $filename = time() . '/' . $extension;
         $file->move('uploads/product',$filename );
         $post->image = $filename;
        }*/
       
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

    public function update(Request $request,$id)
        {
            
            $post=Post::findorfail($id);
            $post->title = $request->get('title');
            $post->excerpt = $request->get('excerpt');
            $post->body = $request->get('body');
            $post->save(); 

            return redirect('post')->with('updated','Post has been updated successfully');

            
        }

}
