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
.read-more
{

 text-decoration: none;

 color: #000000;

 font-weight: bold;

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
        <table border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr><th>Name</th><th>Category</th><th>Title</th><th>Body</th><th>Action</th></tr>
        </thead> 
        <tbody>
        @foreach($articles as $key=>$value)
        <tr>
            <td>{{$value->user->name}}</td>
            <td>{{$value->category->category_name}}</td>
            <td>{{$value->title}}</td>
            <td>{{ strlen(strip_tags($value->body)) > 50 ? "...ReadMore" : "" }}</td>
            <td><a href="/edit/{{$value->id}}">Edit</a> <a href="/delete/{{$value->id}}">Delte</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>

    <a href="/addnew">Add New Article</a>
    </body>
</html>
