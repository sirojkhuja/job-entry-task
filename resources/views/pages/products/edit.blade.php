@extends('layout.master')
@section('title')
    Edit Product
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="/products/{{ $product->id }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group mt-2">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" value="{{ $product->title }}"
                                    class="form-control" placeholder="Product title">
    
                                @error('title')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}"
                                    class="form-control" placeholder="Quantity">
                                @error('quantity')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="price">Price</label>
                                <input type="number" name="price" step="0.01" id="price" value="{{ $product->price }}"
                                    class="form-control" placeholder="Price">
                                @error('price')
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
