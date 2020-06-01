@extends('layouts.default')

@section('title', 'Activity Content')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 px-sm-5 py-3 text-right">
                <a href="{{ route('activities.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Create Activity
                </a>
                <a href="{{ route('report.activities') }}" class="btn btn-info">
                    <i class="fa fa-download"></i> Download Report
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-5 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Bidang yang Upload</th>
                            <th>Finish</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    @forelse ($items as $item)
                    <tbody>
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->start_activity }}</td>
                            <td>{{ $item->end_activity }}</td>
                            <td>{{ $item->role_upload }}</td>
                            <td>{!! $item->finish ? '<i class="btn-success btn-sm fa fa-check"></i>' : '<i class="btn-danger btn-sm fa fa-times"></i>' !!}</td>
                            <td class="text-right">
                                @if ($item->role_upload == Auth::user()->role || Auth::user()->role == 'ORGANISASI') 
                                    @if ($item->finish == false)
                                    <a href="{{ route('activities.finish', $item->id) }}?finish=1" class="btn btn-success btn-sm">
                                        <p class="d-sm-inline d-none">Selesai</p>
                                        <i class="fa fa-check d-block d-sm-none"></i>
                                    </a>
                                    @else
                                        <a href="{{ route('activities.finish', $item->id) }}?finish=0" class="btn btn-warning btn-sm">
                                            <p class="d-sm-inline d-none">Gagalkan</p>
                                            <i class="fa fa-times d-block d-sm-none"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('activities.gallery', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('activities.edit', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('activities.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                @else
                                    <i>Tidak memiliki Akses</i>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @empty
                    <tbody>
                        <tr>
                            <td colspan="6" class="p-3 text-center">Data tidak ditemukan</td>
                        </tr>
                    </tbody>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
