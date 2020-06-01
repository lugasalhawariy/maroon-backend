@extends('layouts.secondary')

@section('title', 'Update Kader')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Kader</h1>
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
            <form method="post" action="{{ route('kader.update', $item->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Update Nama" value="{{ old('nama') ? old('nama') : $item->nama }}">
                </div>
                <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" class="form-control" name="nim" placeholder="Update Nim" value="{{ old('nim') ? old('nim') : $item->nim }}">
                </div>
                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" class="form-control" name="prodi" placeholder="Update Prodi" value="{{ old('prodi') ? old('prodi') : $item->prodi }}">
                </div>
                <div class="form-group">
                    <label for="ttl">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="ttl" placeholder="Update Tanggal lahir" value="{{ old('ttl') ? old('ttl') : $item->ttl }}">
                </div>
                
                <div class="form-group">
                    <label for="alamat_asal">Alamat Asal</label>
                    <textarea name="alamat_asal" class="form-control">{{ old('alamat_asal') ? old('alamat_asal') : $item->alamat_asal }}</textarea>
                </div>
                <div class="form-group">
                    <label for="alamat_jogja">Alamat Jogja</label>
                    <textarea name="alamat_jogja" class="form-control">{{ old('alamat_jogja') ? old('alamat_jogja') : $item->alamat_jogja }}</textarea>
                </div>
                {{-- tombol simpan --}}
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>

            

        </div>
    </div>
    
</div>
@endsection
