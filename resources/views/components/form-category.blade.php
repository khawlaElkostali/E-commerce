@props(['titre','action','method','category'])
@extends('base')
@section('title','Create Product | Ecommerce')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger my-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container my-5">
        <h1>{{$titre}} category</h1>
        <form action="{{ route('categories.'.$action,$category) }}" method="post">
            @csrf
            @method($method)
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name',$category->name)}}">
            </div>
            <input type="submit" class="btn btn-primary w-100" value="Update">
        </form>
   </div>
@endsection
