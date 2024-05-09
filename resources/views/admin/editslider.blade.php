@extends('admin.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-7" style="color: white;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-body">

        <h6 class="card-title" style="margin-top: 100px; margin-left: 20px;">Edit Slider</h6>

        <form class="forms-sample" style="margin-top: 50px; margin-left: 20px;" method="post"
            action="{{route('slider.update', $slider->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="name" autocomplete="off"
                    placeholder="Name" required style="width: 600px;" value="{{$slider->name}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputFile1" class="form-label">Choose</label>
                <input type="file" class="form-control" id="exampleInputFile1" name="file" accept="image/*"
                    placeholder="file" style="width: 600px;">
            </div>
            <input type="submit" class="btn btn-primary me-2" value="Update">
            {{-- <button class="btn btn-secondary">Cancel</button> --}}
        </form>



    </div>
@endsection