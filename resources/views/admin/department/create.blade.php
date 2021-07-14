@extends('layouts.appAdmin')

@section('content')

<div class="container">
    <form action="{{ route('department.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Name" required>
            @if($errors->has('name'))
                <div style="color: red" class="error">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

@endsection
