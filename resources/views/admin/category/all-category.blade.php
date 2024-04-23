@extends('admin.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-7" style="color: white;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-7">
        <div class="card-body">
            <h6 class="card-title">Categories Table</h6>
            {{-- <p class="text-muted mb-3">Add class <code>.table</code></p> --}}
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Created_AT</th>
                            <th>Updated_AT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->status == 0)
                                        {{ 'Inactive' }}
                                    @elseif ($category->status == 1)
                                        {{ 'Active' }}
                                    @endif
                                </td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('edit-category', $category->id) }}"
                                                class="btn btn-primary mb-2">Edit</a>

                                        </div>
                                        <div class="col">
                                            <form action="{{ route('destroy-category', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
