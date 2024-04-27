@extends('admin.app')

@section('content')
    <div class="card mt-7">
        <div class="card-body">
            <h6 class="card-title">Data Table</h6>
            <a href="{{ route('add-product') }}" class="btn btn-primary">Add Product</a>

            {{-- <p class="text-muted mb-3">Add class <code>.table</code></p> --}}
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Created_AT</th>
                            <th>Updated_AT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $product->description }}</td>
                                {{-- <td><a href="{{ asset($slider->file) }}">{{ $slider->file }}</a></td> --}}
                                {{-- <td>
                                    <img src="{{ asset($slider->file) }}" alt="{{ $slider->name }}" style="max-width: 100px;">
                                </td> --}}
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    @if ($product->status == 0)
                                        {{ 'In-active - ' . $product->status }}
                                    @elseif ($product->status == 1)
                                        {{ 'Active - ' . $product->status }}
                                    @endif
                                </td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('show-product', $product->id) }}" class="btn btn-info">Show</a>

                                        </div>
                                        <div class="col">
                                            <a href="{{ route('edit-product', $product->id) }}"
                                                class="btn btn-primary">Edit</a>

                                        </div>
                                        <div class="col">
                                            <form action="{{ route('destroy-product', $product->id) }}" method="POST">
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
