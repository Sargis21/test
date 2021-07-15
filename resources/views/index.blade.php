@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                @foreach ($departments as $department)
                    <th scope="col">{{ $department->name }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    @foreach ($departments as $department)
                        <td>@if($employee->department->contains('id', $department->id)) <b> V </b> @endif</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
