@section('seo')
    @include('meta::manager', [
   'title'         =>  setting('site.title'),
   'description'   => setting('site.description'),
   'robots'=>'index,follow',
   'referrer'=>'origin',
   'image'=>Voyager::image(setting('site.logo')),
   'keywords'=>setting('site.keywords')
])
@endsection

<div class="container" style="margin-top: 120px">

    <livewire:inc.last-products/>

    <section class="my-5">
        <livewire:inc.explore-categories/>
    </section>
    <livewire:inc.last-posts/>

    <section class="my-5">
        <livewire:inc.plans/>
    </section>


</div>

