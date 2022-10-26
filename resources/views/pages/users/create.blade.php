@extends('layout.master')
@section('title')
    New User
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="/users" method="POST">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control" placeholder="User name">
    
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="form-control" placeholder="Email">
                                @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="password">Password</label>
                                <input type="text" name="password" id="password" value="{{ old('password') }}"
                                    class="form-control" placeholder="Password">
                                @error('password')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
