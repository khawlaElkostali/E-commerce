@extends('base')
@section('title','Categories | Ecommerce')
@section('content')

    <h1>Category: {{ $category->name }}</h1>

    <a href="{{ route('categories.index') }}" class="btn btn-primary float-end">Go back</a>

    <table class="table">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Update product</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                     <a class="btn btn-primary" href="{{route('products.edit',$product)}}" >Update</a>
                </td>

            </tr>
        @endforeach
    </table>
@endsection
