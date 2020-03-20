@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <p>Available Groups</p>
    </div>
    @if (count($info) == 0)
    <div class="card-body">
        <p class="text-center">There is no existence Group</p>
    </div>
    @endif
    <div class="row">
        @foreach ($info as $inf)
        <div class="card-body mt-2" style="width:400px;">
            <div class="col-sm">
                <div class="card">
                    <div class="card-header">
                        {{$inf->name}}
                    </div>
                    <div class="card-body">
                        <h3>{{$inf->code}}</h3>
                        <p>{{$inf->description}}</p>
                        <a class="btn btn-success float-right ml-1">Details</a>
                        <form action="{{route('req.store')}}" method="POST">
                            @csrf
                            <input type="text" name="group_id" value="{{$inf->id}}" hidden>
                            <button type="submit" class="btn btn-warning float-right"> Request </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
