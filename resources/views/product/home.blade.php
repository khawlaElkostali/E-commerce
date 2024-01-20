@extends('base')
@section('title','Last Products | Ecommerce')
@section('content')
<h1>Filter</h1>
<div class="col-4">
    <form action="{{ route('Home') }}" method="GET">
        <div>
            <h3>Name</h3>
            <input class="form-control" name="name" value="{{Request::input('name')}}" type="text" placeholder="titre">
        </div>
        <div>
            <h3>Categories</h3>
            @foreach ($categories as $category)
              @if (Request::input('categories'))
                    <div>
                        <input type="checkbox" @checked(in_array("$category->id",Request::input('categories'))) name="categories[]" value="{{  $category->id }}">  {{ $category->name  }}  
                    </div>
              @else
                    <div>
                        <input type="checkbox"  name="categories[]" value="{{  $category->id }}">  {{ $category->name  }}  
                    </div>
              @endif
            @endforeach 
        </div>
        <div>
            <h3>Pricing</h3>
            <label for="">Min</label>
            <input class="form-control" min="{{ $minPrix }}" name="min" value="{{ Request::input('min') }}" type="number" placeholder="min price">
        </div>
        <div>
            <label for="">Max</label>
            <input class="form-control" max="{{ $maxPrix }}" name="max" value="{{ Request::input('max') }}" type="number" placeholder="max price">
        </div>
        <input type="submit" class="btn btn-primary" value="Filtre">
        <a href="{{  route('Home') }}" class="btn btn-secondary">reset</a>
    </form>
</div>
<div class="container">
    <h1>Last products</h1>
    <div class="row">
    @foreach ($products as $product)
    <div class="col-md-4">
    <div class="card">
        <img src="{{asset('storage/'.$product->image)}}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}}</h5>
          <p class="card-text">{{$product->description}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">

                Quantity: <span class="badge bg-success">{{$product->quantity}}</span>
                Prix:<span class="badge bg-primary">{{$product->prix}} MAD</span>

          </li>
          <li class="list-group-item">
            Category: <span class="badge bg-primary">{{$product->category->name}}</span>
        </li>

        </ul>
        <div class="card-footer" style="background-color: rgba(208, 125, 125, 0.21)">
            {{$product->created_at}}
        </div>
      </div>
    </div>
    @endforeach
</div>
</div>
@endsection
