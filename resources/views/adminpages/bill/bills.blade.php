@extends('adminpages.layouts.master')
@section('css')
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Danh mục</title>

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="/source/assets/dest/css/styles1.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
@endsection

@section('content')
{{-- <main> --}}
    <div class="container-fluid px-4">
        <h1 class="mt-4">Danh mục</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.getCateList')}}">Admin</a></li>
            <li class="breadcrumb-item active">Danh mục</li>
        </ol>
        {{-- <div class="card mb-4">
            <div class="card-body">
              
                <a href="{{route('admin.getCateAdd')}}" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Thêm danh mục
                   </a>
                
            </div>
        </div> --}}
        @if (session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Danh sách hóa đơn
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Payment</th>
                                    <th>Date Order</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $bill->id }}</td>
                                    {{-- <td>{{ $bill->id }}</td> --}}
                                    <td>{{ optional($bill->customer)->name }}</td>
                                    {{-- <td>{{ $bill->id_customer }}</td> --}}
                                    <td>{{ $bill->payment }}</td>
                                    <td>{{ $bill->date_order }}</td>
                                    <td>{{ number_format($bill->total) }}</td>
                                    <td>
                                        <form action="{{route ('admin.updateBill', $bill -> id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <select name="status" style="background-color:#00CCFF">
                                                <option value="0" {{ $bill->status == '0' ? 'selected' : '' }} >Đơn hàng mới</option>
                                                <option value="1" {{ $bill->status == '1' ? 'selected' : '' }}>Đơn hàng đang giao</option>
                                                <option value="2" {{ $bill->status == '2' ? 'selected' : '' }}>Đơn hàng đã giao</option>
                                                <option value="3" {{ $bill->status == '3' ? 'selected' : '' }}>Đơn hàng đã hủy</option>
                                            </select>

                                            <button type="submit" title="Cập nhật" style="background-color:yellow;height:24px;color:red ;margin-left: 10px; border:none"><i class="fa-solid fa-pen"></i></button>
                                        </form>
                                    </td>
                                    {{-- <td>
                                        <a href="{{ route('bills.edit', $bill->id) }}" class="btn btn-primary" role="button">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('bills.destroy', $bill->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này không?')">Delete</button>
                                        </form>
                                    </td>                                     --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                    
                </table>
            </div>
        </div>
    </div>
{{-- </main> --}}
{{-- @include('adminpages.category.cate_add') --}}
{{-- @include('admin.modal.cate_edit') --}}
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/source/assets/dest/js/scripts1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="/source/assets/dest/js/datatables-simple-demo.js"></script>
@endsection