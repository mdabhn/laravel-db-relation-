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
                                    <span class="ml-2">
                                        {{$task->task}}
                                    </span>
                                    <small>Created By # {{$task->created_by}}</small>
                                    <span class="float-right ">
                                        @csrf
                                        <a class="btn" href="{{route('groupDetails.edit', ['id'=>$task->id])}}">Move</a>

                                        <a href="" data-toggle="modal" data-target="#exampleModal">Assign the task</a>

                                        <a class="btn" href="/delete/{{$task->id}}">Delete</a>
                                        {{-- popup form --}}
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">Open
                                        </button> --}}
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Assign to Individual or Group
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="">
                                                            <label for="memeber">Available Members:</label>
                                                            <select id="memeber">
                                                                <option value="hossain">Hossain</option>
                                                                <option value="Tasnim">Tasnim</option>
                                                            </select>
                                                            <input type="time" name="" id="">
                                                            <input type="date" name="" id="">
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Assign</button>
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
                            @foreach ($progress as $progres)
                            <tr>
                                <td>
                                    <span>*</span>
                                    <span class="ml-2"> {{$progres->task}} </span>
                                    <span class="float-right ">
                                        @csrf
                                        <a class="btn" href="/updateType/{{$progres->id}}">Move</a>
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
                                        {{-- <a class="btn" href="/updateTypex/{{$dn->id}}">Move</a> --}}
                                        Complited By @ {{$dn->done_by}}
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

@endsection
