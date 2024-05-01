@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-7">
                <div class="card" >
                    <div class="card-header">
                        Product Details
                    </div>
                    {{-- <div class="card-body">
                        <h5 class="card-title">{{ $product->description }}</h5>
                        <p class="card-text">
                            <strong>Category:</strong> {{ $product->category->name }}
                        </p>
                        <p class="card-text">
                            <strong>Price:</strong> ${{ $product->price }}
                        </p>
                        <p class="card-text">
                            <strong>Discount:</strong> {{ $product->discount }}%
                        </p>
                        <p class="card-text">
                            <strong>Description:</strong> {{ $product->description }}
                        </p>
                        <p class="card-text">
                            <strong>Description 2:</strong> {{ $product->description2 }}
                        </p>
                        <p class="card-text">
                            <strong>Review:</strong> {{ $product->review }}
                        </p>
                        <p class="card-text">
                            <strong>Today's Offer:</strong> {{ $product->today_offer }}
                        </p>
                        <p class="card-text">
                            <strong>Super Deal:</strong> {{ $product->super_deal }}
                        </p>
                        <p class="card-text">
                            <strong>Offers:</strong> {{ $product->offers }}
                        </p>
                        <p class="card-text">
                            <strong>Status:</strong> {{ $product->status === 1 ? 'Active' : 'Inactive' }}
                        </p>
                        @if($product->images)
                            <div class="row">
                                @foreach(json_decode($product->images) as $image)
                                    <div class="col-md-4 mb-3">
                                        <img src="/myProduct/{{ asset($image) }}" class="img-fluid rounded" alt="Product Image">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="card-footer">
                            <a href="{{ back()->getTargetUrl() }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div> --}}

                    <div class="row m-3">
                        <div class="col">
                            <label for="category_id" class="form-label">Category</label>
                            <input type="text" class="form-control" value="{{ $product->category->name }}" disabled>
                        </div>

                        {{-- <div class="col-md-6">
                            <label for="exampleInputFile1" class="form-label">Images</label>
                            @foreach(json_decode($product->images) as $image)
                            <img src="{{ asset('myProduct/'.$image) }}" alt="Image" width="100">
                            @endforeach
                        </div> --}}
                    </div>


                    <div class="row m-3">

                        <div class="col-md-12">
                            @if($product->images)
                            <label for="exampleInputFile1" class="form-label">Images</label>
                            @foreach(json_decode($product->images) as $image)
                            <img src="{{ asset('myProduct/'.$image) }}" alt="Image" width="100">
                            @endforeach

                            @else
                            <p>No images found</p>
                            @endif
                        </div>
                    </div>


                    <div class="row m-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label required">Name</label>
                            <input type="text" class="form-control" value="{{ $product->name }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label required">Slug</label>
                            <input type="text" class="form-control" value="{{ $product->slug }}" disabled>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-md-6">
                            <label for="exampleInputUsername1" class="form-label">Description</label>
                            <input type="text" class="form-control" value="{{ $product->description }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputUsername1" class="form-label">Price</label>
                            <input type="text" class="form-control" value="{{ $product->price }}" disabled>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-md-6">
                            <label for="exampleInputUsername1" class="form-label">Discount</label>
                            <input type="text" class="form-control" value="{{ $product->discount }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputUsername1" class="form-label">Description-2</label>
                            <input type="text" class="form-control" value="{{ $product->description2 }}" disabled>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-md-6">
                            <label for="exampleInputUsername1" class="form-label">Review</label>
                            <input type="text" class="form-control" value="{{ $product->review }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputUsername1" class="form-label">Today Offer</label>
                            <input type="text" class="form-control" value="{{ $product->today_offer }}" disabled>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-md-6">
                            <label for="exampleInputUsername1" class="form-label">Super Deal</label>
                            <input type="text" class="form-control" value="{{ $product->super_deal }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputUsername1" class="form-label">Offers</label>
                            <input type="text" class="form-control" value="{{ $product->offers }}" disabled>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-md-6">
                            <label for="status" class="form-label required">Status</label>
                            <input type="text" class="form-control" value="{{ $product->status == 1 ? 'Active' : 'Inactive' }}" disabled>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
