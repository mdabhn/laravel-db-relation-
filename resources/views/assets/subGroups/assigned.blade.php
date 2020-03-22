@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <p>Available Groups</p>
    </div>
    @if (count($groups) == 0)
    <div class="card-body">
        <p class="text-center">There is no existence Group</p>
    </div>
    @endif
    <div class="row">
        @foreach ($groups as $group)
        @for($i = 0; $i < sizeof($group); $i++) <div class="card-body mt-2" style="width:400px;">
            <div class="col-sm">
                <div class="card">
                    <div class="card-header">
                        {{$group[$i]->name}}
                    </div>
                    <div class="card-body">
                        <h3>{{$group[$i]->code}}</h3>
                        <p>{{$group[$i]->description}}</p>
                        <a class="btn btn-success float-right ml-1"
                            href="{{route('group.edit',['id'=>$group[$i]->id])}}">
                            Go In
                        </a>
                    </div>
                </div>
            </div>
    </div>
    @endfor
    @endforeach
    {{-- **************************************************** --}}
</div>
</div>

@endsection
