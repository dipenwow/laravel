@extends('layouts.layout')

   @section('content')

         
       <center>
       <div class="title">
        <h1><p>Posts</p></h1>
       
       </div>
       
       @if (session('created'))
       <div class="alert alert-success">
        {{ session('created') }}

       </div>
       @endif
       @if (session('deleted'))
       <div class="alert alert-danger">
        {{ session('deleted') }}

       </div>
       @endif
       @if (session('updated'))
       <div class="alert alert-success">
        {{ session('updated') }}

       </div>
       @endif
       </center>
       

       
       
   <center>
    <div class="table">
    <table class="table-hover" >
        
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Body</th>
            
            <th>Action</th>
        </tr>
            @foreach($posts as $post)
            <tr>
            <td>{{$post['id']}}</td>
            <td>{{$post['title']}}</td>
            <td>{{$post['excerpt']}}</td>
            <td>{{$post['body']}}</td>
            
            <td>
                <div style="display:flex;flex-direction:row; ">
                <a class="btn btn-primary" style="margin:0 5px;" href="edit/{{ $post['id']}}">Edit</a>
              
              <form action="{{route('destroy',$post->id)}}" method="POST">
              @csrf    
              @method('DELETE')
          <button type="submit" class="btn btn-danger"> Delete</button>
          </form>

                </div>
           
                
               
            </td>
            </tr>

            
            @endforeach
    </table>
    

    </div>
  
    
   </center>
    
    
 @endsection
    
