<?php
use App\Http\Controllers\UserController;
if (isset($_GET['logout'])) {
    out();
  }
function out()
{
    UserController::logout();
    
} 
echo Session::get("userdetail");
?>
<style>
    img{
        width:150px;
        height:180px;
        margin-left:auto;
        margin-right:auto;
        display:block;
    }
    body{
        
    }
    .division{
    margin-left:25%;
    margin-right:25%;
    text-align: center;
    }
    .margins{
        margin-left:25%;
    margin-right:25%;
    }
    .post{
        margin-left:25%;
        margin-right:25%;
    }
    
</style>
<html>
        <head>
                <meta charset="utf-8">
                <title>Laravel MongoDB CRUD Tutorial With Example</title>
                <link rel="stylesheet" href="{{asset('css/app.css')}}">
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        </head>
<body>
    @yield('content')
</body>
</html>