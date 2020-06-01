@extends('layouts.default')

@section('title', 'Management Kader')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 px-sm-5 py-3 text-right">
                <a href="{{ route('kader.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Create Kader
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-5 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nim</th>
                            <th>Prodi</th>
                            <th>Tanggal Lahir</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    @forelse ($items as $item)
                    <tbody>
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->ttl }}</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('kader.edit', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('kader.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @empty
                    <tbody>
                        <tr>
                            <td colspan="9" class="p-3 text-center">Data tidak ditemukan</td>
                        </tr>
                    </tbody>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
