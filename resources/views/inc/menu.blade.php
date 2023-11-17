<nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
    <div class="container-fluid custom-container">
        <a class="navbar-brand logo f-30 text-dark fw-bold" href="/">
            <img src="{{Voyager::image(setting('site.logo'))}}" class="logo-dark" style="height: 32px!important;">
        </a>
        <div>
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto navbar-center">
                <li class="nav-item">
                    <a href="/" class="nav-link"><i
                            class="mdi mdi-home-outline f-20 me-2 align-middle"></i>{{__('site.Home')}}</a>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('jobs')}}" class="nav-link">
                        <span class="fa fa-play"></span>
                        {{__('site.joblist')}}</a>
                    </a>
                </li>


                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="pagedropdown" role="button"
                       data-bs-toggle="dropdown">
                        <span class="fa fa-download"></span>
                        {{__('site.downloads')}}
                    </a>

                    <div class="dropdown-menu dropmenu-width dropdown-menu-center">
                        <div class="">
                            <ul class="row list-unstyled">
                                @foreach($categories as $category)
                                    <li class="col-6">
                                        <a class="dropdown-item" href="/category/{{$category->slug}}"><i
                                                class="mdi {{$category->icon}} f-20 me-2 align-middle"></i>{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </li>
                <!--end dropdown-->

                <li class="nav-item">
                    <a href="{{route('blog')}}" class="nav-link">
                        <span class="fa fa-newspaper"></span>
                        {{__('site.Blog')}}</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('BuyPlan')}}" class="nav-link">
                        <span class="fa fa-car"></span>
                        {{__('site.BuyPlan')}}</a>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('Contact')}}" class="nav-link">
                        <span class="fa fa-mail-bulk"></span>
                        {{__('site.Contact')}}
                    </a>
                </li>
                <!--end dropdown-->
            </ul>
            <!--end navbar-nav-->
            @guest
                <a href="{{route('login')}}" class="btn btn-primary">{{__('site.LoginRegister')}}</a>
            @else
                <a href="{{route('dashboard')}}" class="btn btn-primary">{{__('site.Profile')}}</a>
            @endguest
        </div>

    </div>
    <!--end container-->
</nav>
