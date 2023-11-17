@section('title', $category->name)
<section class="item-detail section bg-light">
    <div class="container">

        <div class="row mt-4">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb default mb-0">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">{{$category->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <input wire:model="search" type="text" class="form-control"
                           placeholder="Search..." aria-label="search">
                    <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <span class="fa fa-search"></span>
                </span>
                    </div>
                </div>
            </div>

            @foreach($products as $product)
                <div class="col-lg-3 col-12">
                    <a href="/product/{{$product->slug}}">
                        <div class="card shadow">
                            <img data-src="{{Voyager::image($product->image)}}"
                                 src="{{asset('images/lazy_img.jpg')}}"
                                 loading="lazyload"
                                 alt="{{$product->title}}" class="img-fluid lazyload">
                            <div class="card-body">
                                <h6 class="fw-bold mb-0">{{$product->title}}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
</section>
