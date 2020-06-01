@extends('layouts.secondary')

@section('title', 'Activity Content')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Aktivitas</h1>
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
            <form method="post" action="{{ route('activities.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" class="form-control ckeditor">{{ old('about') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="start_activity">Start Date</label>
                    <input type="date" class="form-control" name="start_activity" placeholder="Start Activity" value="{{ old('start_activity') }}">
                </div>
                <div class="form-group">
                    <label for="end_activity">End Date</label>
                    <input type="date" class="form-control" name="end_activity" placeholder="End Activity" value="{{ old('end_activity') }}">
                </div>
                {{-- tombol simpan --}}
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>

            

        </div>
    </div>
    
</div>
@endsection
