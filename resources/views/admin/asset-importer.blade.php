<div>
    <div class="card shadow">
        <div class="card-header">
            <h3>https://www.timecode.ir/  ----> single Product</h3>
        </div>
        <div class="card-body">
            <label>Url</label>
            <input wire:model.defer="url" type="text" class="form-control"/>
            <label>type</label>
            <select wire:model.defer="type" class="form-control">
                <option value="video">video</option>
                <option value="audio">audio</option>
                <option value="image">image</option>
            </select>
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

    <div class="card shadow">
        <div class="card-header">
            <h3>https://www.timecode.ir/  ----> Products Archives</h3>
        </div>
        <div class="card-body">
            <label>Url</label>
            <input wire:model.defer="Archive_url" type="text" class="form-control"/>
            <label>type</label>
            <select wire:model.defer="type" class="form-control">
                <option value="video">video</option>
                <option value="audio">audio</option>
                <option value="image">image</option>
            </select>
            <label>category</label>
            <select wire:model.defer="category_select" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>
        </div>
        <div class="card-footer">
            <button wire:click="ImportProductArchives()" class="btn btn-primary">
                <span>Import</span>
                <div wire:loading wire:target="ImportProductArchives">
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
