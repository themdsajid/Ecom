@extends('admin.app')

@section('content')
    <script>
        function CopyData(val) {
            var a = document.getElementById(val.id).value;
            var inputs = document.querySelectorAll("#slug");
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = a.replace(/\s+/g, "-").replace(/\//g, "-");
            }
        }
    </script>

    @if (session('success'))
        <div class="alert alert-success mt-7" style="color: white;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-body">
        <h6 class="card-title" style="margin-top: 100px; margin-left: 20px;">Edit Menu</h6>

        <form class="forms-sample mt-4" style="margin-left: 20px;" method="post" action="{{ route('update-menu', $slug->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="page_name" class="form-label required">Page Name</label>
                <input type="text" name="page_name" class="form-control" id="page_name" onkeyup="CopyData(this)" required style="width: 600px;" value="{{$slug->page_name}}">
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label required">Page URL</label>
                <input type="text" name="slug" class="form-control" id="slug" style="text-transform: lowercase; width: 600px;" required value="{{$slug->slug}}">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label required">Status</label>
                <select name="status" class="form-control" id="status" style="text-transform: lowercase; width: 600px;" required value="{{$slug->status}}">>
                    <option value="0">0 - Header</option>
                    <option value="1">1 - Footer</option>
                  </select>


                {{-- <input type="text" name="status" class="form-control" id="status" style="text-transform: lowercase; width: 600px;" required value="{{$slug->slug}}"> --}}


            </div>


            <div class="mb-3">
                <label for="status" class="form-label required">Field Status</label>
                <select name="field_status" class="form-control" id="feild_status" style="text-transform: lowercase; width: 600px;" required value="{{$slug->field_status}}">>
                    <option value="0">0 - Active</option>
                    <option value="1">1 - Inactive</option>
                  </select>


                {{-- <input type="text" name="status" class="form-control" id="status" style="text-transform: lowercase; width: 600px;" required value="{{$slug->slug}}"> --}}


            </div>


            <button type="submit" class="btn btn-primary me-2">Update</button>
        </form>
    </div>
@endsection
