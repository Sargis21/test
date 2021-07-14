@extends('layouts.appAdmin')

@section('content')
    @if (count($departments) == 0)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> Make sure you have a department before adding a employee
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session()->get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Name" required>
                @if($errors->has('name'))
                    <div style="color: red" class="error">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input name="surname" type="text" class="form-control" id="surname" placeholder="Surname" required>
                @if($errors->has('surname'))
                    <div style="color: red" class="error">{{ $errors->first('surname') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="patronymic">Patronymic</label>
                <input name="patronymic" type="text" class="form-control" id="patronymic" placeholder="Patronymic">
                @if($errors->has('patronymic'))
                    <div style="color: red" class="error">{{ $errors->first('patronymic') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="floor">Floor</label>
                <select name="floor" type="text" class="form-control" id="floor">
                    <option value=""></option>
                    <option value="man">Man</option>
                    <option value="female">Female</option>
                </select>
                @if($errors->has('floor'))
                    <div style="color: red" class="error">{{ $errors->first('floor') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="wage">Wage</label>
                <input name="wage" type="number" class="form-control" id="wage" placeholder="Wage">
                @if($errors->has('wage'))
                    <div style="color: red" class="error">{{ $errors->first('wage') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <select required multiple name="department[]" type="text" class="form-control" id="department">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach

                </select>
                @if($errors->has('floor'))
                    <div style="color: red" class="error">{{ $errors->first('floor') }}</div>
                @endif
            </div>
            <button @if(count($departments)  == 0) disabled @endif type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

@endsection
