<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delta News</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  </head>
  <body>
    <div class="container">
      <h2>DELTA NEWS: Know whats happening around you</h2><br/>
      <div class="container">
    </div>
      <form method="post" action="{{url('add')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="UserName">User Name:</label>
            <input type="text" class="form-control" name="username">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Email">Email:</label>
            <input type="text" class="form-control" name="email">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Password">Password:</label>
            <input type="password" class="form-control" name="password">
          </div>
        </div>
        
        <div class="row">
        <div class="col-md-4"></div>
        
        <div class="form-group col-md-4">
            <label for="cover_image">Add Profile Image</label><br>
            {{Form::file('cover_image')}}
        </div>
        </div>
        <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
              @if (\Session::has('alertmessage'))
      <div class="alert alert-success">
        <p>{{ \Session::get('alertmessage') }}</p>
      </div><br />
     @endif
      </form>
   </div>
  </body>
</html>   