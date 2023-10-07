@extends('adminpages.layouts.master')
@section('css')
    <link rel="stylesheet" href="/assets/product.css">
@endsection
@section('content')
<!-- hiện ra toàn bộ thông báo lỗi -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!------------------------------------------------------------------------------>
<form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data" class="addproduct">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ isset($products)?$products->name:'' }}" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" value="{{ isset($products)?$products->description:'' }}" required></textarea>
    </div>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control" value="{{ isset($products)?$products->image:'' }}" required>
    </div>
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="category">unit</label>
        <input type="text" name="unit" id="unit" class="form-control" value="{{ isset($products)?$products->unit:'' }}" required>
    </div>
    @error('category')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="new_price">Price</label>
        <input type="text" name="unit_price" id="unit_price" class="form-control" value="{{ isset($products)?$products->unit_price:'' }}" required>
    </div>
    @error('new_price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="old_price">Promotion Price</label>
        <input type="text" name="promotion_price" id="promotion_price" class="form-control" value="{{ isset($products)?$products->promotion_price:'' }}" required>
    </div>
    @error('old_price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <button type="submit" class="btn btn-primary">edit</button>
</form>    
@endsection