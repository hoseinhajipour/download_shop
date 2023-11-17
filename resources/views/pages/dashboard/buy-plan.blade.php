<div>

    <label>Plan</label>
    <select wire:model="plan_select" class="form-control">
        @foreach($plans as $plan)
            <option value="{{$plan->id}}">
                {{$plan->title}} {{$plan->price.'$'}}
            </option>
        @endforeach
    </select>
    <hr/>
    <label>GateWay</label>
    <select wire:model="gatway_select" class="form-control">
        @foreach($gatways as $gatway)
            <option value="{{$gatway->id}}">
                {{$gatway->title}}
            </option>
        @endforeach
    </select>
    <hr/>
    <button wire:click="Checkout" class="btn btn-primary">Checkout</button>

</div>
