<section class="text-center">
    @foreach($categories as $category)
        <a class="btn btn-outline-primary my-2" href="/category/{{$category->slug}}">
            <i class="mdi {{$category->icon}} f-20 me-2 align-middle"></i>{{$category->name}}
            <span>( {{$category->product_count()}} )</span>
        </a>
    @endforeach
</section>
