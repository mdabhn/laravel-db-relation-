@extends('layouts.group')

@section('content')

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
                                    <span class="ml-2"> {{$task->task}} </span>
                                    <span class="float-right ">
                                        <a class="btn" href="/mtask/{{$task->id}}">Move</a>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <form action="{{ route('groupDetails.store')}}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" name="task" class="form-control" required>
                                            <input name="group_id" value="{{$group->id}}" hidden>
                                            <input name="name" value="{{$user->name}}" hidden>
                                        </div>
                                        <button type="submit" class="btn btn-success float-right mt-1">
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
                            <tr>
                                <td>
                                    <span>1.</span>
                                    <span class="ml-2"> Make Some Work </span>
                                    <span class="float-right ">X</span>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span>2.</span>
                                    <span class="ml-2"> Show The Work </span>
                                    <span class="float-right"><a href="#"
                                            style="color:red; text-decoration:none">X</a></span>
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
                    Done
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
