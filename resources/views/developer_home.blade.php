<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
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
        <div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>


@if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
        

        <form action="{{ route('article.new') }}" method="post">
            {{csrf_field()}}
            <select name="user">
                <option>Select User</option>
                @foreach($users as $key=>$value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select><br>

            <select name="category">
                <option>Select Category</option>
                @foreach($categories as $key=>$value)
                    <option value="{{$value->id}}">{{$value->category_name}}</option>
                @endforeach
            </select><br>
            
  <label for="fname">Title:</label><br>
  <input type="text" id="title" name="title"><br>
  <label for="lname">Boldy:</label><br>
  <textarea name="body"></textarea><br>
  <input type="submit" name="submit" value="submit">
</form>

    <a href="/addnew">Add New Article</a>
    </body>
</html>
