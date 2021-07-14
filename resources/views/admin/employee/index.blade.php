@extends('layouts.appAdmin')

@section('content')


    @if (session()->has('name'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfully!</strong> {{ session()->get('name') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-9">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Patronymic</th>
                    <th scope="col">Floor</th>
                    <th scope="col">Wage</th>
                    <th scope="col">Departments</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @forelse($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->surname }}</td>
                        <td>{{ $item->patronymic }}</td>
                        <td>{{ $item->floor }}</td>
                        <td>{{ $item->wage }}</td>
                        <td>{{ $item->department->pluck('name')->implode(', ') }}</td>
                        <td><a class="btn btn-primary" href="{{ route('employee.edit', $item->id) }}">edit</a></td>
                        <td>
                            <form action="{{ route('employee.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td><h2>Not Found Employee</h2></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <a href="{{ route('employee.create') }}" class="btn btn-success">Create</a>
        </div>
    </div>


@endsection
