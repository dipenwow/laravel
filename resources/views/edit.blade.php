<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .form-group{
            margin: auto;
         width: 50%;
         border: 3px solid black;
        padding: 10px;
        }
        
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h1>Edit</h1></center>
    
<form method="Post" action="{{route('update',$post->id)}}">  
@method('PATCH')     
 @csrf     
          <div class="form-group">      
              <label for="Id">Id:</label><br/><br/>  
              <input type="number" name="Id" value={{$post->id}}><br/><br/>  
          
  
      
              <label for="Title">Title</label><br/><br/>  
              <input type="text" class="form-control" name="title" value={{$post->title}}><br/><br/>  
           
      
              <label for="excerpt">Excerpt:</label><br/><br/>  
              <input type="text" class="form-control" name="excerpt" value={{$post->excerpt}}><br/><br/>  
           
      
              <label for="Body">Body</label><br/><br/>  
              <input type="text" class="form-control" name="body" value={{$post->body}}><br/><br/>  
           
<br/>  
  
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>  
    
</body>
</html>