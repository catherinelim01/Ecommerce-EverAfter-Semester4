

@section('content')
    @if ($results->count() > 0)
        <div class="row">
            @foreach ($results as $result)
                <div class="col-md-4">
                    <div class="single-new-arrival mb-50 text-center">
                        <!-- Display the product details here -->
                        <div class="col-md-4">
                            <div class="single-new-arrival mb-50 text-center">
                                <div class="popular-img">
                                    <img src="{{ $result->PRODUCT_URL }}" alt="">
                                    <div class="favorit-items">
                                        <img src="assets/images/logo/love-full1.png" alt="" id="favorite-{{ $loop->index }}"
                                             data-product="{{ $result->PRODUCT_ID }}" onclick="changeImage(this)">
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="product_details.php">{{ $result->PRODUCT_NAME }}</a></h3>
                                    <span>Rp. {{ number_format($result->PRODUCT_PRICE, 0, ',', '.') }}</span>
                                    <br>
                                    <button id="open-popup" type="submit" class="btn btn-primary detailkiri details" onclick="none">Check
                                        Out</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No products found</p>
    @endif
@endsection
