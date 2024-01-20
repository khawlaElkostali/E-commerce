@extends('base')
@section('title','Categories | Ecommerce')
@section('content')

    <h1>Categories</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary float-end">Create</a>

    <table class="table">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th colspan="3">Actions</th>
        </tr>

        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>

                        <a href="{{ route('categories.show',$category) }}"  class="btn btn-info">show</a>
                        <a class="btn btn-primary" href="{{route('categories.edit',$category)}}" >Update</a>
                </td>
                <td>
                    <form action="{{route('categories.destroy',$category)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $categories->links() }}

@endsection
