@extends('admin.app')

@section('content')
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
                            <th>Created_AT</th>
                            <th>Updated_AT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slugs as $slug )
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th>{{$slug->id}}</th>
                            <td>{{$slug->page_name}}</td>
                            <td>{{$slug->slug}}</td>
                            <td>{{$slug->created_at}}</td>
                            <td>{{$slug->updated_at}}</td>
                            {{-- <td>
                                <form action="{{ route('', $slug->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
