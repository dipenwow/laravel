@extends('layouts.layout')

   @section('content')


    <center><h1>Edit</h1></center>
    
<form method="Post" action="{{route('update',$post->id)}}">  
@method('PATCH')     
 @csrf     
          <div class="form-group">      
              <label for="Id">Id:</label><br/><br/>  
              <input type="number" name="Id" value={{$post->id}}><br/>
              
              <br/>  
          
  
      
              <label for="Title">Title</label><br/><br/>  
              <input type="text" class="form-control" name="title" value={{$post->title}}>
              <span style="color:red">@error('title'){{$message}}@enderror</span><br>
              <br/>  
           
      
              <label for="excerpt">Author</label><br/><br/>  
              <input type="text" class="form-control" name="excerpt" value={{$post->excerpt}}>
              <span style="color:red">@error('excerpt'){{$message}}@enderror</span><br>
      
              <label for="Body">Body</label><br/><br/>  
              <input type="text" class="form-control" name="body" value={{$post->body}}>
              <span style="color:red">@error('body'){{$message}}@enderror</span><br>  
           
<br/>  
  
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>  


@endsection
    
