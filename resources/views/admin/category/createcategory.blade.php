@extends('admin.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-7" style="color: white;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-body">

        <h6 class="card-title" style="margin-top: 100px; margin-left: 20px;">Add Category</h6>

        <form class="forms-sample" style="margin-top: 50px; margin-left: 20px;" method="post"
            action="{{ route('category-store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="name" autocomplete="off"
                    placeholder="Name" required style="width: 600px;">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label required">Status</label>
                <select name="status" class="form-control" id="status" style="text-transform: lowercase; width: 600px;" required >
                    <option value="0">0 - Inactive </option>
                    <option value="1">1 - Active</option>
                  </select>
            </div>

            <input type="submit" class="btn btn-primary me-2" value="Submit">
            {{-- <button class="btn btn-secondary">Cancel</button> --}}
        </form>



    </div>
@endsection
