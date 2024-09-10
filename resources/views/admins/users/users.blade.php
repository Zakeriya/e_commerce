@extends('admins.layout')
@section('users-color')
    bg-gradient-primary
@endsection
@section('content')

<div class="container mt-4">
    @if (permission('admin','add_user'))
        <a href="{{ route('back.users.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i>
        </a>
    @endif
    <h2 class="mb-4">Users List</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration  }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    {{-- @if (permission('admin','delete_product')) --}}


                    <td>
                        @if (permission('admin','delete_user'))
                            <form action="{{ route('back.users.destroy', ['user' => $user->id]) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="border: none; background: none; cursor: pointer;">
                                    Delete
                                </button>
                            </form>
                        @endif
                    </td>
                    {{-- @endif --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

