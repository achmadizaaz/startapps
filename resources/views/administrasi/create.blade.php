@extends('layouts.administrasi')
{{-- @section('title', 'Dashboard Administrasi') --}}
@section('content')
    <div class="container p-2 mb-3">
        <h2>Data Pengguna</h2>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" name="telp" value="{{ old('telp') }}">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="roles" id="role" class="form-select" name="id_role" required>
                    <option value=""> Silakan Pilih Role Pengguna </option>
                    @foreach ($roles = \Spatie\Permission\Models\Role::all() as $role)   
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit" >Submit</button>
            </div>
            
        </form>

    </div>
@endsection