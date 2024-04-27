@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-7">
                <div class="card" >
                    <div class="card-header">
                        Product Details
                    </div>
                    <div class="card-body">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
