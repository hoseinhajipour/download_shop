<div class="panel panel-bordered">
    <div class="Panel-header container-fluid">
        <label>title</label>
        <input wire:model.defer="title" class="form-control"/>
        <label>url</label>
        <input wire:model.defer="url" class="form-control"/>
        <label>type</label>
        <select wire:model.defer="type" class="form-control">
            <option value="free">free</option>
            <option value="direct">Direct</option>
        </select>
        <button wire:click="newLink()" class="btn btn-primary ">New Link</button>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>title</th>
                <th>url</th>
                <th>type</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($links as $link)
                <tr>
                    <td>{{$link->title}}</td>
                    <td>{{$link->url}}</td>
                    <td>{{$link->type}}</td>
                    <td>
                        <button wire:click="delete({{$link->id}})" class="btn btn-danger ">delete</button>
                        @if($link->type=="direct")
                            <button wire:click="makeFreeLink({{$link->id}})" class="btn btn-success">
                                <span>Make Free Link (za.gl)</span>
                                <div wire:loading wire:target="makeFreeLink({{$link->id}})">
                                    <div class="d-flex justify-content-center">
                                        Loading...
                                        <span class="spinner-border spinner-border-sm" role="status"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                            </button>
                            <button wire:click="shrinkme({{$link->id}})" class="btn btn-primary">
                                <span>Make Free Link (shrinkme.io)</span>
                                <div wire:loading wire:target="shrinkme({{$link->id}})">
                                    <div class="d-flex justify-content-center">
                                        Loading...
                                        <span class="spinner-border spinner-border-sm" role="status"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                            </button>
                            <button wire:click="ad2({{$link->id}})" class="btn btn-warning">
                                <span>Make Free Link (2ad.ir)</span>
                                <div wire:loading wire:target="ad2({{$link->id}})">
                                    <div class="d-flex justify-content-center">
                                        Loading...
                                        <span class="spinner-border spinner-border-sm" role="status"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
