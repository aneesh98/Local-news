<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Laravel MongoDB CRUD Tutorial With Example</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  </head>
  <style>
      body{
        background:linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url("../public/storage/backgroundimg.jpg");
        color:white;
        text-align:center;
        margin-top:;
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

  .oswaldfont
  {   
      font-family: Oswald;
      letter-spacing: 20px;
  }
  </style>
  <body>
      <div class="oswaldfont positioning">
            <h1>DELTA NEWS:<h3>Know What's happening around you</h3></h1>
      </div>
<div class="">
    @csrf
    <br><br>
<button class="btn btn1" onclick="location.href = '{{url('add')}}';">REGISTER</button>
    
<button class="btn btn1" onclick="location.href='{{url('login')}}';">LOGIN</button>

</div>
</body>