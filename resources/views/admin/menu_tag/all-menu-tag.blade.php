@extends('admin.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-7" style="color: white;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-7">
        <div class="card-body">
            <h6 class="card-title">Menu Tag Table</h6>
            {{-- <p class="text-muted mb-3">Add class <code>.table</code></p> --}}
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id</th>
                            <th>Page Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Field Status</th>
                            <th>Created_AT</th>
                            <th>Updated_AT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slugs as $slug)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $slug->id }}</th>
                                <td>{{ $slug->page_name }}</td>
                                <td>{{ $slug->slug }}</td>
                                {{-- <td>{{ $slug->status}}</td> --}}
                                <td>
                                    @if ($slug->status == 0)
                                        {{ 'Header' }}
                                    @elseif ($slug->status == 1)
                                        {{ 'Footer' }}
                                    @endif
                                </td>
                                <td>
                                    @if ($slug->field_status == 0)
                                        {{'Active'}}
                                    @elseif ($slug->field_status == 1)
                                        {{'In-active'}}
                                    @endif
                                </td>
                                <td>{{ $slug->created_at }}</td>
                                <td>{{ $slug->updated_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('edit-menu', $slug->id) }}"
                                                class="btn btn-primary mb-2">Edit</a>

                                        </div>
                                        <div class="col">
                                            <form action="{{ route('destroy-menu', $slug->id) }}" method="POST">
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
