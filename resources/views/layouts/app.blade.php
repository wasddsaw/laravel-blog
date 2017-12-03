<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{asset('images/laravel.ico')}}">

        <title>{{config('app.name','LSAPP')}}</title>

        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/sticky-footer-navbar.css')}}" rel="stylesheet">
    </head>
    <body>
        @include('inc.navbar')
        <main role="main" class="container">
        <div class="mt-3">
            @include('inc.messages')
            @yield('content')
         </div>   
         </main>
        @include('inc.footer') 

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery.min.js')}}"><\/script>')</script>
    <script src="{{asset('js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    </body>
</html>
