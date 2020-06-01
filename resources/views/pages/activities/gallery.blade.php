@extends('layouts.default')

@section('title', 'Gallery Activity')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 px-sm-5 py-3 text-right">
                <a href="{{ route('galleries.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Create Photo for Activity
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 px-5 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name Activity</th>
                            <th>Photo</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    @forelse ($items as $item)
                    <tbody>
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->activities->title }}</td>
                            <td class=" text-center align-items-middle">
                                <img src="{{ url($item->photo) }}" style="width: 100px;"/>
                            </td>
                            <td class="text-right">
                                
                                <form action="{{ route('galleries.destroy', $item->id) }}" method="POST" class="d-inline">
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
                            <td colspan="5" class="p-3 text-center">Data tidak ditemukan</td>
                        </tr>
                    </tbody>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
