@extends('layouts.secondary')

@section('title', 'Update Users')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Bidang <i>"{{ $item->name }}"</i></h1>
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
            <form method="post" action="{{ route('users.update', $item->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama" class="form-control-label">Ganti Bidang</label>
                    <select name="role" class="form-control">
                        @if (Auth::user()->role == 'KETUA')
                            <option value="KETUA">Ketua</option>
                            <option value="BENDAHARA">Bendahara</option>
                            <option value="SEKRETARIS">Sekretaris</option>
                        @endif
                        <option value="ORGANISASI">Bidang Organisasi</option>
                        <option value="BIDER">Bidang Kader</option>
                        <option value="RPK">Bidang Riset Pengembagan Keilmuan</option>
                        <option value="MEDKOM">Bidang Media Komunikasi</option>
                        <option value="SOSPEM">Bidang Sosial Pemberdayaan</option>
                        <option value="SBO">Bidang Seni Budaya dan Olahraga</option>
                        <option value="HIKMAH">Bidang Hikmah</option>
                        <option value="KWU">Bidang Kewirausahaan</option>
                        <option value="USER">Jadikan User</option>
                    </select>
                </div>
               
                {{-- tombol simpan --}}
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>

            

        </div>
    </div>
    
</div>
@endsection
