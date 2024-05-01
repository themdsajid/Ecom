@extends('admin.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-7" style="color: white;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-body">

        <h6 class="card-title" style="margin-top: 100px; margin-left: 20px;">Add/Update Category</h6>

        <form class="forms-sample" style="margin-top: 50px; margin-left: 20px;" method="post"
            action="{{ isset($category) ? route('category-update', $category->id) : route('category-store') }}"
            enctype="multipart/form-data">
            @csrf
            @if (isset($category->id))
                @method('PATCH')
            @endif
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="name" autocomplete="off"
                    placeholder="Name" style="width: 600px;"
                    value="{{ old('name', isset($category->id) ? $category->name : '') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label required">Status</label>
                <select name="status" class="form-control" id="status" style="text-transform: lowercase; width: 600px;">
                    <option value="0"
                        {{ old('status', isset($category->id) ? $category->status : '') == '0' ? 'selected' : '' }}>0 -
                        Inactive</option>
                    <option value="1"
                        {{ old('status', isset($category->id) ? $category->status : '') == '1' ? 'selected' : '' }}>1 -
                        Active</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary me-2" value="{{ isset($category->id) ? 'Update' : 'Create' }}">
            {{-- <button class="btn btn-secondary">Cancel</button> --}}
        </form>
    </div>
@endsection
