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
            <form method="post" action="{{ route('activities.update', $item->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') ? old('title') : $item->title }}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" class="form-control ckeditor">{{ old('about') ? old('about') : $item->about }}</textarea>
                </div>
                <div class="form-group">
                    <label for="start_activity">Start Activity</label>
                    <input type="date" class="form-control" name="start_activity" placeholder="Start Activity" value="{{ old('start_activity') ? old('start_activity') : $item->start_activity }}">
                </div>
                <div class="form-group">
                    <label for="end_activity">End Activity</label>
                    <input type="date" class="form-control" name="end_activity" placeholder="Date Activity" value="{{ old('end_activity') ? old('end_activity') : $item->end_activity }}">
                </div>
                {{-- tombol simpan --}}
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>

            

        </div>
    </div>
    
</div>
@endsection
