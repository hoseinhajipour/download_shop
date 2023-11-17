<section class="item-detail section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <label>{{__('site.email')}}</label>
                <input wire:model.defer="email" type="email"
                       @if(Auth::check()) disabled @endif
                       class="form-control">
                <label>{{__('site.name')}}</label>
                <input wire:model.defer="name" type="text" class="form-control">
                @guest
                    <label>{{__('site.password')}}</label>
                    <input wire:model.defer="password" type="password" class="form-control">
                @endguest

            </div>
            <div class="col-lg-6 col-12">
                <h4>{{$plan->title}}</h4>
                <h2>{{number_format($plan->price)}} <span>{{ setting('payment.currency') }}</span></h2>
                <hr/>
                <label>{{__('site.GateWay')}}</label>
                <select wire:model="gatway_select" class="form-control">
                    @foreach($gatways as $gatway)
                        <option value="{{$gatway->id}}">
                            {{$gatway->title}}
                        </option>
                    @endforeach
                </select>
                <hr/>
                <button wire:click="Checkout" class="btn btn-primary">{{__('site.Checkout')}}</button>
            </div>
        </div>

    </div>
</section>
