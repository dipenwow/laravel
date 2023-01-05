@extends('layouts.layout')

  @section('content')


<h1 style="text-align:center;">Create Post</h1>

<div class="form">

<form action="/store" method="POST" enctype="multipart/form-data">
{{csrf_field()}}
   
    <label>Title</label><br>
    <input type="text" name="title"  /><br>
    <label>excerpt</label><br>
    <input type="text" name="excerpt" /><br>
    <label>Body</label><br>
    <textarea class="form-control" name="body"></textarea><br>
    <label >Image</label><br>
    <input type="file" name="image" /><br>
    <br><input type="submit" class="btn btn-primary" value="Create Post" />
    
</form>
</div>

@endsection
    

