@extends('layout.master')
@section('title')
    Edit User
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="/users/{{ $user->id }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group mt-2">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}"
                                    class="form-control" placeholder="User name">
    
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}"
                                    class="form-control" placeholder="Email">
                                @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
