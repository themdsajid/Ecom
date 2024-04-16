@extends('admin.app')

@section('content')
    <div class="card mt-7">
        <div class="card-body">
            <h6 class="card-title">Slider Table</h6>
            {{-- <p class="text-muted mb-3">Add class <code>.table</code></p> --}}
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>File</th>
                            <th>Created_AT</th>
                            <th>Updated_AT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $slider->id }}</th>
                                <td>{{ $slider->name }}</td>
                                {{-- <td><a href="{{ asset($slider->file) }}">{{ $slider->file }}</a></td> --}}
                                <td>
                                    <img src="{{ asset($slider->file) }}" alt="{{ $slider->name }}" style="max-width: 100px;">
                                </td>
                                <td>{{ $slider->created_at }}</td>
                                <td>{{ $slider->updated_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('slider-edit', $slider->id) }}"
                                                class="btn btn-primary">Edit</a>

                                        </div>
                                        <div class="col">
                                            <form action="{{ route('slider.destroy', $slider->id) }}" method="POST">
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
