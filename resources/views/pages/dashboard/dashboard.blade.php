<div>
    <div class="row">
        <div class="col-4">
            <a href="{{route('dashboard.buyPlan')}}" class="btn btn-primary form-control">
                @if(Auth::user()->CurrentPlan())
                    {{Auth::user()->CurrentPlan()->title}}
                @else
                    You do not have a reserved subscription
                @endif
                <hr/>
                Subscription type
            </a>
        </div>
        <div class="col-4">
            <a href="" class="btn btn-primary form-control">
                @if(Auth::user()->CurrentPlan())
                    {{Auth::user()->CurrentPlan()->end}}
                @else
                    --
                @endif
                <hr/>
                expiration date
            </a>
        </div>
        <div class="col-4">
            <a href="{{route('mytransactions')}}" class="btn btn-primary form-control">
                Transactions
                <hr/>
                View purchase history
            </a>
        </div>
    </div>
    <table class="table">
        <tbody>
        <tr>
            <td>
                name
            </td>
            <td>
                {{Auth::user()->name}}
            </td>
        </tr>
        <tr>
            <td>
                email
            </td>
            <td>
                {{Auth::user()->email}}
            </td>
        </tr>
        <tr>
            <td>
                registery date
            </td>
            <td>
                {{Auth::user()->created_at}}
            </td>
        </tr>
        <tr>
            <td>
                Subscribe to the reservation
            </td>
            <td>
                @if(Auth::user()->CurrentPlan())
                    {{Auth::user()->CurrentPlan()->title}}
                @else
                    You do not have a reserved subscription
                @endif
            </td>
        </tr>
        <tr>
            <td>
                Subscription start date
            </td>
            <td>
                @if(Auth::user()->CurrentPlan())
                    {{Auth::user()->CurrentPlan()->start}}
                @else
                    --
                @endif
            </td>
        </tr>
        <tr>
            <td>
                Subscription End date
            </td>
            <td>
                @if(Auth::user()->CurrentPlan())
                    {{Auth::user()->CurrentPlan()->end}}
                @else
                    --
                @endif
            </td>
        </tr>

        </tbody>
    </table>
</div>
