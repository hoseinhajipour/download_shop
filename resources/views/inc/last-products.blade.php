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
                    <a href="{{route('product',["slug"=>$product->slug]) }}" class="item">

                        @if($product->type=="video" || $product->type=="audio")
                            <video preload="none"
                                   width="100%"
                                   poster="{{Voyager::image($product->image)}}"
                                   controls>
                                <source src="{{$product->preview_url}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{Voyager::image($product->image)}}"
                                 alt="{{$product->title}}" class="img-fluid">
                        @endif
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
