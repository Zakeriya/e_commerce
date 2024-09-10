@extends('admins.layout')
@section('admins-color')
    bg-gradient-primary
@endsection
@section('content')

<div class="container mt-4">
    <div class="text-start mb-3 d-flex justify-content-end m-3">
        <a href="{{ route('back.admins.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <h2 class="mb-4">Admins List</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $loop->iteration  }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        @foreach ($roles as $role)
                            @if ($admin->hasRole($role->name))
                                    {{ $value=$role->name?$role->name:'None' }}
                            @endif
                        @endforeach
                        @if (!isset($value))
                                None
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('back.admins.destroy', ['admin' => $admin->id]) }}" method="POST" onsubmit="confirmDelete(event, '{{ $admin->id }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: none; cursor: pointer;">
                                <i class="fas fa-trash-alt" style="font-size: 24px; color: red;"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

