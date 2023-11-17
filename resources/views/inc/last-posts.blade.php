<section class="my-5 text-center inner-blog section bg-light">
    <h1>{{__('site.lastnews')}}</h1>
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
    <div class="text-center">
        <a href="{{route('blog')}}" class="btn btn-primary">همه اخبار</a>
    </div>
</section>
