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
        <x-form titre='Create' :product="$product" action='store' method="POST" :categories="$categories" />
   </div>
@endsection
