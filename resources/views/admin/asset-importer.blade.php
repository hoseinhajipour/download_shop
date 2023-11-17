<div class="card shadow">
    <div class="card-header">
        <h3>https://unity-asset.ir/</h3>
    </div>
    <div class="card-body">
        <label>Url</label>
        <input wire:model.defer="url" type="text" class="form-control"/>
        <label>offest title</label>
        <input wire:model.defer="offset" type="number" class="form-control"/>
        <label>category</label>
        <select wire:model.defer="category_select" class="form-control">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

        </select>
    </div>
    <div class="card-footer">
        <button wire:click="ImportProduct" class="btn btn-primary">
            <span>Import</span>
            <div wire:loading wire:target="ImportProduct">
                <div class="d-flex justify-content-center">
                    Loading...
                    <span class="spinner-border spinner-border-sm" role="status"
                          aria-hidden="true"></span>
                </div>
            </div>
        </button>
    </div>
</div>
