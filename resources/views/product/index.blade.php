@extends('base')
@section('title','Products | Ecommerce')
@section('content')

    <h1>Products list</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary float-end">Create</a>
    <table class="table">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>prix</th>
            <th colspan="2">Actions</th>
        </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <form action="{{ route('categories.show',$product->category_id) }}">
                        <button  type="submit" class="badge bg-primary">{{ $product->category->name }}</button>
                    </form>
                </td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <img src="{{ asset('storage/'.$product->image) }}" width="100px" alt="">
                </td>
                <td>{{ $product->prix }} MAD</td>
                <td>
                        <a class="btn btn-primary" href="{{route('products.edit',$product)}}" >Update</a>
                </td>
                <td>
                    <form action="{{route('products.destroy',$product)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $products->links() }}

@endsection
