<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading text-center">
                    <h2>{{__('site.PricingPlan')}}</h2>
                </div>
            </div>
        </div>
        <div class="row text-center">
            @foreach($plans as $plan)
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header text-center">
                            <h4>{{$plan->title}}</h4>
                            <h2>{{number_format($plan->price) }} <span>{{ setting('payment.currency') }}</span></h2>
                        </div>
                        <div class="card-body">
                            {!! $plan->description !!}
                        </div>
                        <div class="card-footer text-center">
                            <button wire:click="buy({{$plan->id}})"
                                    class="btn btn-success">
                                {{__('site.GetStarted')}}
                                <div wire:loading wire:target="buy({{$plan->id}})">
                                    <div class="d-flex justify-content-center">
                                        Loading...
                                        <span class="spinner-border spinner-border-sm" role="status"
                                              aria-hidden="true"></span>

                                    </div>
                                </div>
                            </button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
