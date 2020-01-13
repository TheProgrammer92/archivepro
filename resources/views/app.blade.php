<!doctype html>
<html lang="fr">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{--//framework materialize--}}
        <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection">

        {{--animate css--}}

        <link rel="stylesheet" href="{{asset('css/animate.css')}}">

        {{--//viewport for mobile responsive--}}
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


        {{--//my framework--}}
        <link rel="stylesheet" href="{{asset('css/TheProgrammer.css')}}">

        {{--bootstrap--}}
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}


        {{-- //fonts--}}
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      {{----}} <link href="https://fonts.googleapis.com/css?family=Rubik:300,400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    </head>

<body class="body" id="body">

        <div id="app">
              <App></App>
        </div>
        <script  type="text/javascript"  src="{{asset('js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>
</html>



















