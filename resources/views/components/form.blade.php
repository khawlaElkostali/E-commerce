@props(['titre','product','action','method','categories'])
<h1>{{$titre}} product</h1>
<form action="{{ route('products.'.$action,$product) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{old('name',$product->name)}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" value="{{old('description',$product->description)}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Quantity</label>
        <input type="number" class="form-control" name="quantity" value="{{old('quantity',$product->quantity)}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="mb-3">
       <img src="{{ asset('storage/'.$product->image) }}" alt="">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Category</label>
        <select name="category_id" class="form-control" >
            @foreach ($categories as $category)
                <option @selected($product->category_id == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Prix</label>
        <input type="number" class="form-control" name="prix" value="{{old('prix',$product->prix) }}">
    </div>
    <input type="submit" class="btn btn-primary w-100" value="{{$titre}}">
</form>
