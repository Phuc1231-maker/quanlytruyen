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
<form action="{{ route('bills.update', $bills->id) }}" method="POST" enctype="multipart/form-data" class="addproduct">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="total">Total</label>
        <input type="text" name="total" id="total" class="form-control" value="{{ isset($bills)?$bills->total:'' }}" required>
    </div>
    @error('total')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="payment">Payment</label>
        <input type="text" name="payment" id="payment" class="form-control" value="{{ isset($bills)?$bills->payment:'' }}" required>
    </div>
    @error('total')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="note">note</label>
        <textarea name="note" id="note" class="form-control" value="{{ isset($bills)?$bills->note:'' }}" required></textarea>
    </div>
    @error('note')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <button type="submit" class="btn btn-primary">edit</button>
</form>    
@endsection