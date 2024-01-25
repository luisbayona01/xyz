<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="{{  asset('css/bootstrap.min.css')  }}"  rel="stylesheet" crossorigin="anonymous">
      <link href="{{asset('css/toastr.min.css')}}"  rel="stylesheet" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-e7gv1iSRu9qTxaTsz4mi8JQudArI1FpK8/ghBsgaP7I=" crossorigin="anonymous" />
      <script src="{{asset('js/jquery-3.7.1.min.js')}}"crossorigin="anonymous"></script>
       <script src="{{asset('js/bootstrap.min.js')}}"crossorigin="anonymous"></script>
      <script src="{{asset('js/toastr.min.js')}}"crossorigin="anonymous"></script>
       <script src="{{asset('js/loginregister.js')}}"crossorigin="anonymous"></script>

       </head>
    <body class="antialiased">
 <div class="navbar navbar-expand-sm navbar-light bg-light justify-content-center">

    <a href="{{ route('login') }}" class="navbar-brand font-semibold text-dark">Log in</a>

    <a href="{{ route('register') }}" class="navbar-brand ml-4 font-semibold text-dark">Register</a>

</div>


   <main class="py-4">
            @yield('content')
        </main>
    </body>
</html>
