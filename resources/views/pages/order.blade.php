<section class="item-detail section bg-light">
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <a href="{{route('dashboard')}}" class="btn btn-success">داشبورد</a>
            </div>
        </div>

    </div>
</section>
