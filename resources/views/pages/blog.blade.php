<section class="inner-blog section bg-light">
    <!-- start container -->
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb default mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('index')}}" class="text-muted">{{__('site.Home')}}</a>
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">{{__('site.Blog')}}</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-lg-8 order-2 order-lg-1">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-lg-6">
                            <div class="blog-item mt-4">
                                <div class="blog-image position-relative">
                                    <a href="{{route('post',["slug"=>$post->slug])}}">
                                        <img src="{{Voyager::image($post->image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="blog-content mt-3">
                                    <a href="{{route('post',["slug"=>$post->slug])}}">
                                        <h5 class="fw-bold">{{$post->title}}</h5>
                                        <p class="text-muted f-15 mb-3">
                                            {{$post->excerpt}}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    {{$posts->links()}}
                </div>
            </div>


            <div class="col-lg-4 order-1 order-lg-2">
                <div class="blog-side-box mb-5 mb-lg-0">
                    <div class="items">
                        <div class="title-bottom-border"></div>
                        <div class="categorie-box mt-4">
                            <div class="forum mt-2">
                                <form class="form">
                                    <input type="search" class="form-control" id="exampleFormControlInput1"
                                           placeholder="Search...">
                                </form>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-dark w-100">Search</button>
                            </div>
                        </div>
                    </div>


                    <div class="items mt-4">
                        <h6 class="fw-bold mb-3">Let's Connect</h6>
                        <hr>
                        <div class="title-bottom-border"></div>
                        <div class="categorie-box mt-4">
                            <div class="d-flex">
                                <div class="you-tube">
                                    <div class="avatar-sm align-items-center bg-danger">
                                        <i class="mdi mdi-youtube f-30 text-white"></i>
                                    </div>
                                </div>
                                <div class="facebook mx-3">
                                    <div class="avatar-sm align-items-center bg-dark">
                                        <i class="mdi mdi-facebook f-30 text-white"></i>
                                    </div>
                                </div>
                                <div class="dribbble">
                                    <div class="avatar-sm align-items-center bg-pink">
                                        <i class="mdi mdi-instagram f-30 text-white"></i>
                                    </div>
                                </div>
                                <div class="facebook mx-3">
                                    <div class="avatar-sm align-items-center bg-blue">
                                        <i class="mdi mdi-twitter f-30 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="items mt-4">
                        <h6 class="fw-bold mb-3">Categories</h6>
                        <hr>
                        <div class="title-bottom-border"></div>
                        <div class="categorie-box mt-4">
                            @foreach($categories as $category)
                                <div class="d-flex align-items-center">
                                    <h6 class="fw-semibold mb-0">{{$category->name}}</h6>
                                    <div class="ms-auto">
                                    </div>
                                </div>
                                <hr class="my-2">
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- end container -->
</section>
