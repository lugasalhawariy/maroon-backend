@extends('layouts.default')

@section('title', 'Users Content')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 px-5 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Bidang</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    @forelse ($users as $user)
                    <tbody>
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <label for="#" class="badge badge-primary badge-sm">{{ $user->role }}</label>
                            </td>
                            <td class="text-right">


                                @if ($user->role != 'ADMIN')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                @endif
                                @if (Auth::user()->role == 'ADMIN' && $user->role != 'ADMIN')
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                @endif
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
