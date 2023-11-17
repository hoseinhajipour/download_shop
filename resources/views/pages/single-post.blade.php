<section class="artical section bg-light">
    <!-- start container -->
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb default mb-0">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/blog" class="text-muted">blog</a>
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">{{$post->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="blog-side-box mb-5 mb-lg-0">

                    <div class="items mt-4">
                        <h6 class="fw-bold mb-3">Let's Connect</h6>
                        <hr>
                        <div class="title-bottom-border"></div>
                        <div class="categorie-box mt-4">
                            <div class="d-flex">
                                <div class="dribbble">
                                    <a href="{{setting('site.instagram')}}">
                                        <div class="avatar-sm align-items-center bg-danger">
                                            <i class="mdi mdi-youtube f-30 text-white"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="dribbble">
                                    <a href="{{setting('site.youtube')}}">
                                        <div class="avatar-sm align-items-center bg-pink">
                                            <i class="mdi mdi-instagram f-30 text-white"></i>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="items mt-4">
                        <h6 class="fw-bold mb-3">Categories</h6>
                        <hr>
                        <div class="title-bottom-border"></div>
                        <div class="categorie-box mt-4">
                            <div class="d-flex align-items-center">
                                <h6 class="fw-semibold mb-0">General</h6>
                                <div class="ms-auto">
                                        <span
                                            class="badge rounded-pill shadow-sm text-dark py-2 px-3 f-18 fw-normal">425</span>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex align-items-center">
                                <h6 class="fw-semibold mb-0">NFT Update</h6>
                                <div class="ms-auto">
                                        <span
                                            class="badge rounded-pill shadow-sm text-dark py-2 px-3 f-18 fw-normal">425</span>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex align-items-center">
                                <h6 class="fw-semibold mb-0">Marketplace</h6>
                                <div class="ms-auto">
                                        <span
                                            class="badge rounded-pill shadow-sm text-dark py-2 px-3 f-18 fw-normal">425</span>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex align-items-center">
                                <h6 class="fw-semibold mb-0">Platform Update</h6>
                                <div class="ms-auto">
                                        <span
                                            class="badge rounded-pill shadow-sm text-dark py-2 px-3 f-18 fw-normal">425</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-lg-8">
                <div class="artical-box">
                    <div class="artical-image">
                        <img src="{{Voyager::image($post->image)}}" alt="" class="img-fluid">
                    </div>
                    <div class="artical-title mt-4">
                        <h1 class="fw-bold display-5">{{$post->title}}</h1>
                    </div>

                    <div class="artical-content mt-5">
                       {!! $post->body !!}

                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- end container -->
</section>
