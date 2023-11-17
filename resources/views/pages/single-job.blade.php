<section class="item-detail section bg-light">
    <div class="container">

        <div class="row mt-4">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb default mb-0">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">{{__('site.Home')}}</a>
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">
                            <a href="{{route('jobs')}}">لیست مشاغل</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <img src="{{Voyager::image($job->authorId->avatar)}}" width="100%"/>
                            </div>
                            <div class="col-11">
                                <b>{{$job->title}}</b><br/>
                                <b>{{$job->categoryId->title}}</b>
                                <hr/>
                                <b>{{$job->authorId->name}}</b><br/>
                                <b>{{$job->CountryId->title}},{{$job->stateId->title}},{{$job->cityId->title}}</b>
                                <br/>
                                <b>{{$job->salary}}</b>
                            </div>
                        </div>
                        <div>
                            {!! $job->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body text-center">
                        @auth
                            <button wire:click="SendResume" class="btn btn-primary">ارسال رزومه</button>
                        @endauth

                        @guest
                            <a href="{{route('login')}}" class="btn btn-primary">ارسال رزومه</a>
                        @endguest
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
