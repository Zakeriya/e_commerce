@extends('admins.layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <h4>Create New Role</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('back.roles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Role Name Here...">
                    </div>

                    <!-- Guard -->
                    <div class="mb-3">
                        <label for="guard_name" class="select-control">Guard Name</label>
                        <select name="guard_name" id="guard_name">
                            <option value="admin" >Admin</option>
                            <option value="seller" >Seller</option>
                        </select>
                    </div>

                    <!-- Permissions -->
                    <div class="mb-3">
                        <label class="form-control text-2xl bg-gray-700">Select Permissions:</label>
                        @foreach ($permissions as $permission)
                            <span>{{ $permission->name }}</span>
                            <input type="checkbox" name="arrayPermissions[]" value="{{ $permission->name }}">
                        @endforeach
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
