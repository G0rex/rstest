<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

</head>
<body>
<ul class="chat"></ul>
@foreach($messages as $message)
    <li>
        <b>{{$message->author}}</b>
        <p>{{$message->content}}</p>
    </li>
    @endforeach
<form action="chat/message" method="POST">
    <h2>Автор</h2>
    <input type="text" name='author' />
    <br>
    <br>
    {{csrf_field()}}
    <h2>Сообщение</h2>
    <textarea name="content" style="width:100%;height: 50px;"></textarea>

    <input type="submit" value="Отправить"/>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js" integrity="sha256-WPeFPWD3PZQUDrpFnDM1N2KadNVwCfNS4cCZ78b76T8=" crossorigin="anonymous"></script>
<script>
    var socket = io(':6001');
    function appendMessage(data){
        $('.chat').append(
                $('<li/>').append(
                        $('<b/>').text(data.author),
                        $('<p/>').text(data.content)
                )
        );
    }
//    $('form').on('submit',function(){
//        var text = $('textarea').val(),
//                msg = { message : text};
//
//        socket.send(msg);
//        appendMessage(msg);
//        $('textarea').val('');
//        return false;
//    });
    socket.on('chat:message',function(data){
        console.log(data);
        appendMessage(data);
    });

</script>
{{--<div class="flex-center position-ref full-height">--}}
{{--@if (Route::has('login'))--}}
{{--<div class="top-right links">--}}
{{--@auth--}}
{{--<a href="{{ url('/home') }}">Home</a>--}}
{{--@else--}}
{{--<a href="{{ route('login') }}">Login</a>--}}
{{--<a href="{{ route('register') }}">Register</a>--}}
{{--@endauth--}}
{{--</div>--}}
{{--@endif--}}

{{--<div class="content">--}}
{{--<div class="title m-b-md">--}}
{{--Laravel--}}
{{--</div>--}}

{{--<div class="links">--}}
{{--<a href="https://laravel.com/docs">Documentation</a>--}}
{{--<a href="https://laracasts.com">Laracasts</a>--}}
{{--<a href="https://laravel-news.com">News</a>--}}
{{--<a href="https://forge.laravel.com">Forge</a>--}}
{{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
</body>
</html>
