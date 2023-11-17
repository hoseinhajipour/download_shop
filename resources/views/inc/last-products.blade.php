<div class="row">

    <div class="col-12">
        <form action="/shop">
            <div class="input-group mb-3">
                <input name="q" type="search" class="form-control"
                       placeholder="{{ __('site.Search') }}"
                       aria-label="search"
                       aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                <span class="input-group-text d-block" id="basic-addon1">
                    <span class="fa  fa-search"></span>
                </span>
                </div>
            </div>
        </form>
    </div>
    @foreach($products as $product)
        <div class="col-lg-3 col-6">
            <div class="card shadow my-3">
                <div class="card-image mt-3">
                    <a href="/product/{{$product->slug}}" class="item">
                        <img data-src="{{Voyager::image($product->image)}}"
                             src="{{asset('images/lazy_img.jpg')}}"
                             loading="lazyload"
                             alt="{{$product->title}}" class="img-fluid lazyload">
                    </a>
                </div>
                <div class="card-body">
                    <a href="/product/{{$product->slug}}" class="item">
                        <h6 class="fw-bold mb-0">{{$product->title}}</h6>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-block my-3">
        {{ $products->links() }}
    </div>
</div>
