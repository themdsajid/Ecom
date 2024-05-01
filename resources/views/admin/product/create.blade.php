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




    {{-- New On --}}
    <div class="row mt-7">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Product</h6>
                    <hr>
                    {{-- <p class="text-muted mb-3">Read the <a href="https://github.com/RobinHerbots/Inputmask"
                            target="_blank"> Official Inputmask Documentation </a>for a full list of instructions and other
                        options.</p> --}}
                    {{-- old-code --}}
                    {{-- <form class="forms-sample" method="post" action="{{ route('store-product') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-control" required
                                    style="width: 600px;">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputFile1" class="form-label">Choose</label>
                                <input type="file" class="form-control" id="exampleInputFile1" name="images[]" multiple
                                    accept="image/*" placeholder="file" style="width: 600px;">
                                <small id="fileHelp" class="form-text text-muted">Maximum 4 images allowed.</small>
                            </div>
                            <script>
                                document.getElementById('exampleInputFile1').addEventListener('change', function() {
                                    var files = this.files;
                                    if (files.length > 4) {
                                        alert('You can only upload a maximum of 4 images.');
                                        this.value = '';
                                    }
                                });
                            </script>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="page_name" class="form-label required">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    onkeyup="CopyData(this)" required style="width: 600px;">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label required">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug"
                                    style="text-transform: lowercase; width: 600px;" required>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Description</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="description"
                                    autocomplete="off" placeholder="Description" required style="width: 600px;">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Price</label>
                                <input type="number" class="form-control" id="exampleInputUsername1" name="price"
                                    autocomplete="off" placeholder="Price" required style="width: 600px;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Discount</label>
                                <input type="number" class="form-control" id="exampleInputUsername1" name="discount"
                                    autocomplete="off" placeholder="Discount" required style="width: 600px;">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Description-2</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="description2"
                                    autocomplete="off" placeholder="Description-2" required style="width: 600px;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Review</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="review"
                                    autocomplete="off" placeholder="Review" required style="width: 600px;">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Today Offer</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="today_offer"
                                    autocomplete="off" placeholder="Today Offer" required style="width: 600px;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Super Deal</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="super_deal"
                                    autocomplete="off" placeholder="Super Deal" required style="width: 600px;">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Offers</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="offers"
                                    autocomplete="off" placeholder="Offers" required style="width: 600px;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label required">Status</label>
                                <select name="status" class="form-control" id="status"
                                    style="text-transform: lowercase; width: 600px;" required>
                                    <option value="0">0 - Inactive </option>
                                    <option value="1">1 - Active</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary me-2" value="Submit" style="width: 100px;">
                    </form> --}}

                    {{-- New-Code --}}
                    <form class="forms-sample" method="post" action="{{ route('store-product') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-control" style="width: 600px;">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputFile1" class="form-label">Choose</label>
                                <input type="file" class="form-control" id="exampleInputFile1" name="images[]" multiple
                                    accept="image/*" placeholder="file" style="width: 600px;">
                                <small id="fileHelp" class="form-text text-muted">Maximum 4 images allowed.</small>
                                @error('images.*')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <script>
                                document.getElementById('exampleInputFile1').addEventListener('change', function() {
                                    var files = this.files;
                                    if (files.length > 4) {
                                        alert('You can only upload a maximum of 4 images.');
                                        this.value = '';
                                    }
                                });
                            </script>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="page_name" class="form-label required">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                    onkeyup="CopyData(this)" style="width: 600px;">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label required">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug"
                                    style="text-transform: lowercase; width: 600px;">
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Description</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="description"
                                    autocomplete="off" placeholder="Description" style="width: 600px;">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Price</label>
                                <input type="number" class="form-control" id="exampleInputUsername1" name="price"
                                    autocomplete="off" placeholder="Price" style="width: 600px;">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Discount</label>
                                <input type="number" class="form-control" id="exampleInputUsername1" name="discount"
                                    autocomplete="off" placeholder="Discount" style="width: 600px;">
                                @error('discount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Description-2</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="description2"
                                    autocomplete="off" placeholder="Description-2" style="width: 600px;">
                                @error('description2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Review</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="review"
                                    autocomplete="off" placeholder="Review" style="width: 600px;">
                                @error('review')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Today Offer</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="today_offer"
                                    autocomplete="off" placeholder="Today Offer" style="width: 600px;">
                                @error('today_offer')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Super Deal</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="super_deal"
                                    autocomplete="off" placeholder="Super Deal" style="width: 600px;">
                                @error('super_deal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Offers</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="offers"
                                    autocomplete="off" placeholder="Offers" style="width: 600px;">
                                @error('offers')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label required">Status</label>
                                <select name="status" class="form-control" id="status"
                                    style="text-transform: lowercase; width: 600px;">
                                    <option value="0">0 - Inactive </option>
                                    <option value="1">1 - Active</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary me-2" value="Submit" style="width: 100px;">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
