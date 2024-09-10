@extends('admins.layout')
@section('roles-color')
    bg-gradient-primary
@endsection
@section('content')

<div class="container mt-4">
    <div class="text-start mb-3 d-flex justify-content-end m-3">
        <a href="{{ route('back.roles.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <h2 class="mb-4">Roles List</h2>
    @if (count($roles)>0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Guard Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $loop->iteration  }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>

                        <td>
                            <form action="{{ route('back.roles.destroy', ['role' => $role->id]) }}" method="POST" onsubmit="confirmDelete(event, '{{ $role->id }}')">
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
    @else
        <div class="alert alert-danger w-75 m-auto text-center text-info">
            No Roles Avaliable
        </div>
    @endempty

</div>
@endsection

