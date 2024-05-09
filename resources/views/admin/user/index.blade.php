@extends('admin.app')

@section('content')
    <div class="card mt-7">
        <div class="card-body">
            <h6 class="card-title">User Table</h6>
            <a href="{{ route('user-create') }}" class="btn btn-primary">Add User</a>
            {{-- <p class="text-muted mb-3">Add class <code>.table</code></p> --}}
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->role==1)
                                {{'User'}}
                                @elseif ($user->role==2)
                                {{'Vendor'}}
                                @elseif ($user->role==3)
                                {{'Admin'}}
                                @endif
                            </td>
                            <td>
                                @if ($user->status == 0)
                                    {{ 'In-active - ' . $user->status }}
                                @elseif ($user->status == 1)
                                    {{ 'Active - ' . $user->status }}
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
