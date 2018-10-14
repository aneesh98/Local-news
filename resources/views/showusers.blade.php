@extends('layouts.format')
@section('content') 
    @if(count($users)>0)
        @foreach($users as $user)
            @if($user->_id!=Session::get('userdetail')->_id)
            <div class="well margins">
            <h3><a href="">{{$user->username}}</a></h3> 
            <button class="btn  btn-primary" onclick="changetext(this,'{{$user->_id}}')" value="FOLLOW">FOLLOW</button>
            <script>
                function changetext(elmnt,id) {
                    var userid=JSON.stringify(id);
                    var str=JSON.stringify(elmnt.innerHTML);
                    console.log(str);
                    console.log(str.localeCompare("\"FOLLOW\""));
                    if(!str.localeCompare("\"FOLLOW\""))
                    {   console.log("enterd if");
                        elmnt.innerHTML="CANCEL FOLLOW REQUEST";
                        var xhttpfollow=new XMLHttpRequest();
                        xhttpfollow.onreadystatechange=function() {
                        if (this.readyState == 4 && this.status == 200) {
                            elmnt.class="btn btn-primary btn-danger";
                            console.log("Request sent");
                                }
                            };
                            xhttpfollow.open("GET", "sendrequest/".concat(id), true);
                            xhttpfollow.send();
                            
                    }
                    else 
                    {   console.log("entered else");
                        elmnt.innerHTML="FOLLOW";
                        elmnt.class="btn btn-primary";
                    }
                    
                }
                </script>
                
            </div>
            @else
            <div class="well margins">
                <h3><a href="">{{$user->username}} (YOU)</a></h3> 
                </div>
            @endif
        @endforeach
    @endif
@endsection