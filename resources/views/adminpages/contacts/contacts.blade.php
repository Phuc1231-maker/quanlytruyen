@extends('adminpages.layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Danh mục</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.getCateList')}}">Admin</a></li>
            <li class="breadcrumb-item active">Danh mục</li>
        </ol>
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Danh sách liên hệ
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $ct)
                                <tr>
                                    <th scope="row">{{ $ct->id }}</th>
                                    <td scope="row">{{ $ct->name}}</td>
                                    <td scope="row">{{ $ct->email }}</td>
                                    <td scope="row">{{ $ct->message }}</td>
                                    {{-- <td><a class="btn btn-primary btn-sm " href="{{ route('users.edit', $ct->id) }}" role="button">Edit</a></td> --}}
                                    <td>
                                    <form action="{{ route('contacts.destroy', $ct->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="xóa" class="btn btn-primary btn-sm">
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                        
                </table>
            </div>
        </div>
    </div>
@endsection