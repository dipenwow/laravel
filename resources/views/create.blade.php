<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .form{
            margin: auto;
          width: 50%;
         
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
<h1 style="text-align:center;">Create Post</h1>

<div class="form">

<form action="/store" method="POST" enctype="multipart/form-data">
{{csrf_field()}}
   
    <label>Title</label><br>
    <input type="text" name="title"  /><br>
    <span style="color:red">@error('title'){{$message}}@enderror</span><br>
    <label>Author</label><br>
    <input type="text" name="excerpt" /><br>
    <span style="color:red">@error('excerpt'){{$message}}@enderror</span><br>
    <label>Body</label><br>
    <textarea class="form-control" name="body" ></textarea><br>
    <span style="color:red">@error('body'){{$message}}@enderror</span><br>
    <label >Image</label><br>
    <input type="file" name="image" /><br>
    <br><input type="submit" class="btn btn-primary" value="Create Post" />
    
</form>
</div>
    
</body>
</html>
