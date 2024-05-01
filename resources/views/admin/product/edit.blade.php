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
                    <h6 class="card-title">Edit Product</h6>
                    <hr>
                    {{-- <p class="text-muted mb-3">Read the <a href="https://github.com/RobinHerbots/Inputmask"
                            target="_blank"> Official Inputmask Documentation </a>for a full list of instructions and other
                        options.</p> --}}
                    {{-- <form class="forms-sample" method="post" action="{{ route('update-product' , $product->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-control" required style="width: 600px;">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category->name == $category->name ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
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
                                <label for="name" class="form-label required">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    onkeyup="CopyData(this)" required style="width: 600px;" value="{{ $category->name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label required">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug"
                                    style="text-transform: lowercase; width: 600px;" required value="{{ $category->slug }}">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Description</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="description"
                                    autocomplete="off" placeholder="Description" required style="width: 600px;" value="{{ $category->description }}">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Price</label>
                                <input type="number" class="form-control" id="exampleInputUsername1" name="price"
                                    autocomplete="off" placeholder="Price" required style="width: 600px;" value="{{ $category->price }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Discount</label>
                                <input type="number" class="form-control" id="exampleInputUsername1" name="discount"
                                    autocomplete="off" placeholder="Discount" required style="width: 600px;" value="{{ $category->discount }}">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Description-2</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="description2"
                                    autocomplete="off" placeholder="Description-2" required style="width: 600px;" value="{{ $category->description2 }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Review</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="review"
                                    autocomplete="off" placeholder="Review" required style="width: 600px;" value="{{ $category->review }}">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Today Offer</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="today_offer"
                                    autocomplete="off" placeholder="Today Offer" required style="width: 600px;" value="{{ $category->today_offer }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Super Deal</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="super_deal"
                                    autocomplete="off" placeholder="Super Deal" required style="width: 600px;" value="{{ $category->super_deal }}">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Offers</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="offers"
                                    autocomplete="off" placeholder="Offers" required style="width: 600px;" value="{{ $category->offers }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label required">Status</label>
                                <select name="status" class="form-control" id="status" style="text-transform: lowercase; width: 600px;" required>
                                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>0 - Inactive</option>
                                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>1 - Active</option>
                                </select>
                            </div>

                        </div>
                        <input type="submit" class="btn btn-primary me-2" value="Submit" style="width: 100px;">
                    </form> --}}
                    {{-- <form class="forms-sample" method="post" action="{{ route('update-product', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-control" required style="width: 600px;">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="exampleInputFile1" class="form-label">Choose</label>
                                <input type="file" class="form-control" id="exampleInputFile1" name="images[]" multiple accept="image/*" placeholder="file" style="width: 600px;">
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
                                <label for="name" class="form-label required">Name</label>
                                <input type="text" name="name" class="form-control" id="name" onkeyup="CopyData(this)" required style="width: 600px;" value="{{ $product->name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label required">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" style="text-transform: lowercase; width: 600px;" required value="{{ $product->slug }}">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Description</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="description" autocomplete="off" placeholder="Description" required style="width: 600px;" value="{{ $product->description }}">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Price</label>
                                <input type="number" class="form-control" id="exampleInputUsername2" name="price" autocomplete="off" placeholder="Price" required style="width: 600px;" value="{{ $product->price }}">
                            </div>
                        </div>
                        <!-- Other fields ... -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label required">Status</label>
                                <select name="status" class="form-control" id="status" style="text-transform: lowercase; width: 600px;" required>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>0 - Inactive</option>
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>1 - Active</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary me-2" value="Submit" style="width: 100px;">
                    </form> --}}
                    <form class="forms-sample" method="post" action="{{ route('update-product', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row mb-3">
                            <div class="col">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-control" required style="width: 600px;">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="exampleInputFile1" class="form-label">Choose</label>
                                <input type="file" class="form-control" id="exampleInputFile1" name="images[]" multiple accept="image/*" placeholder="file" style="width: 600px;">
                                <small id="fileHelp" class="form-text text-muted">Maximum 4 images allowed. While updating previous images will be deleted.</small>
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
                                <label for="name" class="form-label required">Name</label>
                                <input type="text" name="name" class="form-control" id="name" onkeyup="CopyData(this)" required style="width: 600px;" value="{{ $product->name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label required">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" style="text-transform: lowercase; width: 600px;" required value="{{ $product->slug }}">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Description</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="description" autocomplete="off" placeholder="Description" required style="width: 600px;" value="{{ $product->description }}">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Price</label>
                                <input type="number" class="form-control" id="exampleInputUsername2" name="price" autocomplete="off" placeholder="Price" required style="width: 600px;" value="{{ $product->price }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Discount</label>
                                <input type="number" class="form-control" id="exampleInputUsername3" name="discount" autocomplete="off" placeholder="Discount" required style="width: 600px;" value="{{ $product->discount }}">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Description-2</label>
                                <input type="text" class="form-control" id="exampleInputUsername4" name="description2" autocomplete="off" placeholder="Description-2" required style="width: 600px;" value="{{ $product->description2 }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Review</label>
                                <input type="text" class="form-control" id="exampleInputUsername5" name="review" autocomplete="off" placeholder="Review" required style="width: 600px;" value="{{ $product->review }}">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Today Offer</label>
                                <input type="text" class="form-control" id="exampleInputUsername6" name="today_offer" autocomplete="off" placeholder="Today Offer" required style="width: 600px;" value="{{ $product->today_offer }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Super Deal</label>
                                <input type="text" class="form-control" id="exampleInputUsername7" name="super_deal" autocomplete="off" placeholder="Super Deal" required style="width: 600px;" value="{{ $product->super_deal }}">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputUsername1" class="form-label">Offers</label>
                                <input type="text" class="form-control" id="exampleInputUsername8" name="offers" autocomplete="off" placeholder="Offers" required style="width: 600px;" value="{{ $product->offers }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label required">Status</label>
                                <select name="status" class="form-control" id="status" style="text-transform: lowercase; width: 600px;" required>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>0 - Inactive</option>
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>1 - Active</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary me-2" value="Submit" style="width: 100px;">
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
