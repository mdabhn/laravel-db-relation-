<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="#" class="dropdown-item" onclick="event.preventDefault();">
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @auth
        <div class="mt-3 ml-3">
            <div class="row">
                <div class="col-lg-2">
                    <ul class="list-group">
                        <div class="list list-group-item" style="">
                            <a href="/home">Home</a>
                        </div>
                        <div class="list list-group-item">
                            <a href="">Request</a>
                        </div>
                        <div class="list list-group-item">
                            <a href="">Members</a>
                        </div>
                        <div class="list list-group-item">
                            <a href="">Archived</a>
                        </div>
                        <div class="list list-group-item">
                            <a href="">Assign task</a>
                        </div>
                        <div class="list list-group-item">
                            <a href="">Progress</a>
                        </div>
                        <div class="list list-group-item">
                            <a href="">Files</a>
                        </div>
                        <div class="list list-group-item">
                            <a href="">Query</a>
                        </div>
                        <div class="list list-group-item">
                            <a href="">Go Live</a>
                        </div>
                        <div class="list list-group-item">
                            <a href="">Setting</a>
                        </div>
                    </ul>
                </div>
                <div class="col-lg-10">
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <p class="text-center">
                                    All of the archived Task
                                </p>
                            </div>
                            <div class="card-body text-center">
                                <table class="table">
                                    <thead>
                                        @if (count($files) == 0)
                                        <p class="center">No Files Have Commited</p>
                                        @else
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Uploader Name</th>
                                            <th scope="col">Upload Time</th>
                                            <th scope="col">File</th>
                                            <th scope="col">Approve</th>
                                            <th scope="col">Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($files as $file)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{$file->uploader_name}}</td>
                                            <td>{{$file->created_at->diffForHumans()}}</td>
                                            <td>
                                                {{-- file:///D:\DevOp\Development\Laravel\r\public\upload\files\1584946083Resume v.01.pdf --}}
                                                File
                                            </td>
                                            {{-- improve here  --}}
                                            <td>
                                                @if ($file->approved == 0)
                                                <a href="/approve/{{$file->id}}" class="btn btn-success">Approve</a>
                                                @elseif($file->approved == 1)
                                                <a href="" class="btn btn-success disabled">Approved</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/delete/{{$file->id}}" class=" btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        @yield('content')
        @endauth
    </div>
</body>

</html>
