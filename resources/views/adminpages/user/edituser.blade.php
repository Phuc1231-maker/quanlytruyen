@extends('adminpages.layouts.master')
@section('css')
    <link rel="stylesheet" href="/assets/product.css">
@endsection
@section('content')
<!-- hiện ra toàn bộ thông báo lỗi -->
<header>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</header>
<main>
<!------------------------------------------------------------------------------>
<form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data" class="addproduct">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="full_name" id="name" class="form-control" value="{{ isset($users)?$users->full_name:'' }}" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- <!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!------------------------------------------------------------------------------> --}}
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ isset($users)?$users->email:'' }}" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ isset($users)?$users->phone:'' }}" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control" value="{{ isset($users)?$users->address:'' }}" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="level">Level</label>
        <input type="text" name="level" id="level" class="form-control" value="{{ isset($users)?$users->level:'' }}" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!------------------------------------------------------------------------------>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
</main>
@endsection