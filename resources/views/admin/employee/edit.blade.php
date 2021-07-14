@extends('layouts.appAdmin')

@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
        <form action="{{ route('employee.update', $employee) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ $employee->name }}" required>
                @if($errors->has('name'))
                    <div style="color: red" class="error">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input name="surname" type="text" class="form-control" id="surname" value="{{ $employee->surname }}" required>
                @if($errors->has('surname'))
                    <div style="color: red" class="error">{{ $errors->first('surname') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="patronymic">Patronymic</label>
                <input name="patronymic" type="text" class="form-control" id="patronymic" value="{{ $employee->patronymic }}">
                @if($errors->has('patronymic'))
                    <div style="color: red" class="error">{{ $errors->first('patronymic') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="floor">Floor</label>
                <select name="floor" type="text" class="form-control" id="floor">
                    <option value=""></option>
                    <option @if($employee->floor == 'man') selected @endif value="man">Man</option>
                    <option @if($employee->floor == 'female') selected @endif value="female">Female</option>
                </select>
                @if($errors->has('floor'))
                    <div style="color: red" class="error">{{ $errors->first('floor') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="wage">Wage</label>
                <input name="wage" type="number" class="form-control" id="wage" value="{{ $employee->wage }}">
                @if($errors->has('wage'))
                    <div style="color: red" class="error">{{ $errors->first('wage') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <select required multiple name="department[]" type="text" class="form-control" id="department">
                    @foreach ($departments as $department)
                        <option @if(collect($employee->department)->contains('name', $department->name)) selected @endif value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach

                </select>
                @if($errors->has('floor'))
                    <div style="color: red" class="error">{{ $errors->first('floor') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

@endsection
