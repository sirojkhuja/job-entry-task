@extends('layout.master')
@section('title')
    Products
@endsection
@section('content')
    @if (Auth::user()->role == 'Admin')
        <div class="row mb-4">
            <div class="col-10"></div>
            <a href="/products/create" class="btn btn-primary col-1">
                <i class="fa fa-plus"></i>
            </a>
            <div class="col-1"></div>
        </div>
    @endif
    <table class="table table-striped table-bordered table-hover">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item name</th>
                <th scope="col">Quantiy</th>
                <th scope="col">Price</th>
                <th scope="col">Price with VAT</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>$ {{ $product->price }}</td>
                    <td>$ {{ $product->price_with_vat }}</td>
                    <td>
                        <div class="row">
                            @if (Auth::user()->role === 'Admin')
                                <form action="/products/{{ $product->id }}/edit" method="GET" class="col-2">
                                    @csrf
                                    <div onclick=" this.parentElement.submit()" class="action-button btn btn-warning px-3 py-1 text-white">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                </form>
                                <form action="/products/{{ $product->id }}" method="POST" class="col-2">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <div onclick=" this.parentElement.submit()" class="action-button btn btn-danger px-3 py-1">
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
