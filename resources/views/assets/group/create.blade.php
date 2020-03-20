@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('group.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" style="text-transform: capitalize;" class="form-control"
                    placeholder="name of your Group">
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="code">Group Code</label>
                    <input type="text" name="code" class="form-control" style="text-transform: uppercase;"
                        placeholder="Group Code">
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="4" style="resize:none"
                    placeholder="Description of your Group">
                </textarea>
            </div>

            <button class="btn btn-success float-right">Submit</button>
        </form>
    </div>
</div>


<script>
    @if (Session::has('crt'))
        console.log('New Group Created');
    @endif
</script>
@endsection
