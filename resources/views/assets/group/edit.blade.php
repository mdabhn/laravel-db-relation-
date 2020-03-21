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

        <div class="mt-3 ml-3">
            <div class="row">
                <div class="col-lg-2">
                    <ul class="list-group">
                        <div class="list list-group-item" style="">
                            <a href="/home">Home</a>
                        </div>
                        <div class="list list-group-item">
                            <a href="{{route('req.show',['id'=>$group->id])}}">Request</a>
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        Task
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                @foreach ($tasks as $task)
                                                <tr>
                                                    <td>
                                                        <span>*</span>
                                                        <span class="ml-2">
                                                            {{$task->task}}
                                                        </span>
                                                        <br>
                                                        <small># {{$task->created_by}}</small>
                                                        <span class="float-right ">
                                                            @csrf
                                                            <a class="btn"
                                                                href="{{route('groupDetails.edit', ['id'=>$task->id])}}">Move</a>

                                                            <a href="" data-toggle="modal" data-target="#assign">Assign
                                                                the task</a>

                                                            <a class="btn" href="/delete/{{$task->id}}">Delete</a>
                                                            {{-- popup form --}}
                                                            <div class="modal fade" id="assign" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                Assign to Individual or Group
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="/test">
                                                                                @csrf
                                                                                <label for="memeber">Available
                                                                                    Members:</label>
                                                                                <select id="memeber">
                                                                                    <option value="hossain">Hossain
                                                                                    </option>
                                                                                    <option value="Tasnim">Tasnim
                                                                                    </option>
                                                                                </select>
                                                                                <input type="time" name="" id="">
                                                                                <input type="date" name="" id="">
                                                                                <br>
                                                                                <div class="mt-2">
                                                                                    <button type="submit"
                                                                                        class="btn btn-warning">
                                                                                        Archived
                                                                                    </button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">
                                                                                        Assign
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- popup form --}}
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                <tr>
                                                    <td>
                                                        <form action="{{ route('groupDetails.store')}}" method="POST">
                                                            @csrf
                                                            <div class="input-group">
                                                                <input type="text" name="task" class="form-control"
                                                                    required>
                                                                <input name="group_id" value="{{$group->id}}" hidden>
                                                                <input name="name" value="{{$user->name}}" hidden>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-success float-right mt-1">
                                                                Submit
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        Progress
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                @foreach ($progress as $progres)
                                                <tr>
                                                    <td>
                                                        <span>*</span>
                                                        <span class="ml-2"> {{$progres->task}} </span>
                                                        <span class="float-right ">
                                                            @csrf
                                                            <a class="btn" href="/updateType/{{$progres->id}}">Move</a>
                                                            <a class="btn" href="">Submit</a>
                                                            <a class="btn" href="">Details</a>
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        Done
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                @foreach ($done as $dn)
                                                <tr>
                                                    <td>
                                                        <span>*</span>
                                                        <span class="ml-2"> {{$dn->task}} </span>
                                                        <span class="float-right ">
                                                            @csrf
                                                            {{-- <a class="btn" href="/updateTypex/{{$dn->id}}">Move</a>
                                                            --}}
                                                            Complited By @ {{$dn->done_by}}
                                                            <a class="btn" href="">Details</a>
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
