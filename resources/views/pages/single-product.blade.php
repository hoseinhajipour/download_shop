@section('seo')
    @include('meta::manager', [
   'title'         =>  $Product->title,
   'description'   => setting('site.description'),
   'robots'=>'index,follow',
   'referrer'=>'origin',
   'image'=>Voyager::image(setting('site.logo')),
   'keywords'=>setting('site.keywords')
])
@endsection

<section class="item-detail section bg-light">
    <!-- start container -->
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb default mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('index')}}" class="text-muted">{{__('site.Home')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('category',["slug"=>$category->slug])}}"
                               class="text-muted">{{$category->name}}</a>
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">{{$Product->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row mt-5 align-items-center">
            <div class="col-lg-6">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ Voyager::image($Product->image) }}"
                                 class="d-block w-100" alt="{{$Product->title}}">
                        </div>
                        @if($Product->images)
                            @foreach(json_decode($Product->images)  as $image)
                                <div class="carousel-item">
                                    <img src="{{ Voyager::image($Product->getThumbnail($image, 'cropped')) }}"
                                         class="d-block w-100" alt="{{$Product->title}}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


            </div>
            <div class="col-lg-6">
                <div class="card shadow my-3">
                    <div class="card-header">{{__('site.DownloadBox')}}</div>
                    <div class="card-body">
                        <h2 class="fw-bold text-center">{{$Product->title}}</h2>
                        @foreach($Product->links as $link)

                                <button wire:click="download_direct({{$link->id}})"
                                        class="btn my-3 form-control {{$link->type=="free"?"btn-primary":"btn-success" }}">
                                    <span> دانلود {{$link->type=="free"?"رایگان":"لینک مستقیم"}} {{$link->title}}</span>
                                    <div wire:loading wire:target="download_direct({{$link->id}})">
                                        <div class="d-flex justify-content-center">
                                            Loading...
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                </button>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="backhome-content mt-4 mt-lg-0">

                    <div class="tab-box my-4">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-home"
                                        type="button"
                                        role="tab" aria-controls="pills-home"
                                        aria-selected="true">{{__('site.Details')}}
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content mt-4 ps-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                                <p class="text-muted">{!! $Product->body !!}</p>


                            </div>
                        </div>
                    </div>
                    <div class="text-center my-3">
                        <a href="{{setting('site.telegram')}}">
                            <img src="{{asset('images/telegram.jpg')}}"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container -->


</section>
@push('javascript')
    <script>


    </script>
@endpush
