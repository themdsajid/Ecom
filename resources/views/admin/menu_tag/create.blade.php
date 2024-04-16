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
        <h6 class="card-title" style="margin-top: 100px; margin-left: 20px;">Add Menu</h6>

        <form class="forms-sample mt-4" style="margin-left: 20px;" method="post" action="{{ route('add-menu-store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="page_name" class="form-label required">Page Name</label>
                <input type="text" name="page_name" class="form-control" id="page_name" onkeyup="CopyData(this)" required style="width: 600px;">
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label required">Page URL</label>
                <input type="text" name="slug" class="form-control" id="slug" style="text-transform: lowercase; width: 600px;" required >
            </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
        </form>
    </div>
@endsection
