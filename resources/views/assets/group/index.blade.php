@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <p>Your Groups</p>
    </div>
    @if (count($info) == 0)
    <div class="card-body">
        <p class="text-center">You Have not Created Any Group Yet...</p>
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
                        <a href="{{route('group.edit',['id'=>$inf->id])}}"
                            class="btn btn-success float-right">Assign</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
