@extends('layouts/app');
@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i> {{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('user') }}" class=" btn btn-sm btn-primary"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    </div>
    <div class="card-body ">
        <form action="{{ route('userStore') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-xl-6 mt-2">
                    <label class="form-label"><span class="text-danger">*</span> Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}">

                    @error('nama')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-xl-6 mt-2">
                    <label class="form-label"><span class="text-danger">*</span> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" value="{{old ('email')}}">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-2">
                    <label class="form-label"><span class="text-danger">*</span> Jabatan</label>
                    <select name="jabatan" class="form-control">
                        <option value="" disabled selected>Pilih Jabatan</option>
                        <option value="Admin">Admin</option>
                        <option value="Karyawan">Karyawan</option>
                    </select>
                    @error('jabatan')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 mt-2">
                    <label class="form-label"><span class="text-danger">*</span> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password">

                </div>
                <div class="col-xl-6 mt-2">
                    <label class="form-label"><span class="text-danger">*</span> Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan konfirmasi password">
                </div>
                <div class="col-12">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save mr-2"></i>Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection