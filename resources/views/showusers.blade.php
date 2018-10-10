 @extends('layouts.format')
@section('content') 
    @if(count($users)>0)
        @foreach($users as $user)
            @if($user->_id!=Session::get('userdetail')->_id)
            <div class="well margins">
            <h3><a href="">{{$user->username}}</a></h3> 
            <button class="btn  btn-primary" onclick="changetext(this)" value="FOLLOW">FOLLOW</button>
            <script>
                function changetext(elmnt) {
                    var str=JSON.stringify(elmnt.innerHTML);
                    console.log(str);
                    console.log(str.localeCompare("\"FOLLOW\""));
                    if(!str.localeCompare("\"FOLLOW\""))
                    {   console.log("enterd if");
                        elmnt.innerHTML="CANCEL FOLLOW REQUEST";
                        elmnt.class="btn btn-primary btn-danger";
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