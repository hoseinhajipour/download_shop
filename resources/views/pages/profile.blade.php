<section class="profile section bg-light">
    <!-- start container -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12"></div>
            <div class="col-lg-4 col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <a href="">{{__('site.Dashboard')}}</a>
                        <a href="" class="btn btn-primary form-control">{{__('site.BuyPlan')}}</a>
                        <a href="{{route('mytransactions')}}" class="btn btn-primary form-control">
                            {{__('site.MyTransactions')}}
                        </a>

                    </div>
                </div>
            </div>

        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <a href="" class="btn btn-primary form-control">Current Plan</a>
                    </div>
                    <div class="col-3">
                        <a href="" class="btn btn-primary form-control">Subscription expiration date</a>
                    </div>
                    <div class="col-3">

                    </div>
                    <div class="col-3">

                    </div>
                </div>
            </div>
            <div class="container">
                <p class="alert alert-info">
                    important points:
                    In silver subscription, each account can connect to 2 browsers. If you need, for example, connect to
                    a
                    third browser. You must exit one of the two previous browsers. You can see the number of browsers in
                    which your account is open from this page and, if necessary, exit all of them.
                    If you intend to use the account in your company. You need to get a {{ setting('site.title') }}
                    golden account. Golden
                    account can connect to 10 browsers at the same time.
                    If you still have days or hours left on your subscription, if you renew your subscription, your
                    subscription will be registered under the title "reserved subscription" and will be activated
                    automatically after the current subscription ends.
                </p>
            </div>

        </div>

    </div>
    <!-- end container -->
</section>
