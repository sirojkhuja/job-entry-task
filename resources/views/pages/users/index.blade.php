@extends('layout.master')
@section('title')
    Users
@endsection
@section('content')
    @if (Auth::user()->role == 'Admin')
        <div class="row mb-4">
            <div class="col-10"></div>
            <a href="/users/create" class="btn btn-primary col-1">
                <i class="fa fa-plus"></i>
            </a>
            <div class="col-1"></div>
        </div>
    @endif
    <table class="table table-striped table-bordered table-hover">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <div class="row">
                            @if (Auth::user()->role === 'Admin')
                                <div class="col-1"></div>
                                <form action="/users/{{ $user->id }}/edit" method="GET" class="col-1">
                                    @csrf
                                    <div onclick=" this.parentElement.submit()"
                                        class="btn btn-warning px-3 py-1 text-white">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                </form>
                                <div class="col-1"></div>
                                <form action="/users/{{ $user->id }}" method="POST" class="col-2">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <div onclick=" this.parentElement.submit()" class="btn btn-danger px-3 py-1">
                                        <i class="fa fa-times"></i>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
