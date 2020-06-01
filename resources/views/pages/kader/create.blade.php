@extends('layouts.secondary')

@section('title', 'Tambah Kader')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kader</h1>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-shadow">
        <div class="card-body">
            <form method="post" action="{{ route('kader.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Pilih Akun</label>
                    <select name="users_id" class="form-control">
                        @foreach ($item as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nim" class="form-control-label">Nim</label>
                    <input class="form-control" type="text" name="nim">
                </div>
                <div class="form-group">
                    <label for="prodi" class="form-control-label">Prodi</label>
                    <input class="form-control" type="text" name="prodi">
                </div>
                <div class="form-group">
                    <label for="ttl">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="ttl" placeholder="Tanggal lahir" value="{{ old('ttl') }}">
                </div>
                <div class="form-group">
                    <label for="alamat_asal">Alamat Asal</label>
                    <textarea name="alamat_asal" class="form-control">{{ old('alamat_asal') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="alamat_jogja">Alamat Jogja</label>
                    <textarea name="alamat_jogja" class="form-control">{{ old('alamat_jogja') }}</textarea>
                </div>
                {{-- tombol simpan --}}
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>

            

        </div>
    </div>
    
</div>
@endsection
