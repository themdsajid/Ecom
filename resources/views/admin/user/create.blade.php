@extends('admin.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-7" style="color: white;">
            {{ session('success') }}
        </div>
    @endif




    {{-- New On --}}
    <div class="row mt-7">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add User</h6>
                    <hr>


                    {{-- New-Code --}}
                    <form class="forms-sample" method="post" action="{{ route('user-store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="name"
                                    autocomplete="off" placeholder="Name" style="width: 600px;">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputUsername1" name="email"
                                    autocomplete="off" placeholder="Email" style="width: 600px;">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Permission</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="permission"
                                    autocomplete="off" placeholder="Permission" style="width: 600px;">
                                @error('permission')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Image</label>
                                <input type="file" class="form-control" id="exampleInputUsername1" name="profile_image"
                                    autocomplete="off" placeholder="Image" style="width: 600px;">
                                @error('profile_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label for="role" class="form-label required">Role</label>
                                <select name="role" class="form-control" id="role"
                                    style="width: 600px;">
                                    <option value="3">Admin</option>
                                    <option value="2">Vendor</option>
                                    <option value="1">User</option>
                                </select>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label for="status" class="form-label required">Status</label>
                                <select name="status" class="form-control" id="status"
                                    style="text-transform: lowercase; width: 600px;">
                                    <option value="0">0 - Inactive </option>
                                    <option value="1">1 - Active</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary me-2" value="Submit" style="width: 100px;">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
