<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Laravel MongoDB CRUD Tutorial With Example</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  </head>
  <style>
      body{
          background-image: url("../public/storage/backgroundimg.jpg");
          
      }
  .division
  {
    margin-top:5cm;
    text-align:center;
    background-color:rgb(169,169,169,0.7);
    margin-left:10%;
    margin-right:10%;
    color:black;
    border-radius: 20in;

  }
  .btn1
  {
      
      background-color:green;
      width:5cm;
      
      color:white;
  }
  .head{
      background-color:rgb(169,169,169,0.7);
  }
  </style>
  <body>
      <div class="well container head">
            <h1>Delta News:<h3>Know What's happening around you</h3></h1>
      </div>
<div class="well division">
    @csrf
    <label for="New">New Here?</label><br>
<button class="btn btn1" onclick="location.href = '{{url('add')}}';">REGISTER</button>
    <br><label for="New">Else</label>
   <br><button class="btn btn1" onclick="location.href='{{url('login')}}';">LOGIN</button>

</div>
</body>