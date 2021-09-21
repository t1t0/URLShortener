<div>
    <form wire:submit.prevent="createShortlink" method="POST" action="/create">
        @csrf
        <div class="uk-margin">
            <input wire:model.defer="url" class="uk-input uk-form-width-large" type="text" placeholder="Shorten your link" value="{{ old('url') }}">
            @error('url') <span class="uk-text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="uk-margin">
            <label><input wire:model.defer="nsfw" class="uk-checkbox" type="checkbox" checked> NSFW</label>
        </div>
        <div class="uk-margin">
            <button type="submit" class="uk-button uk-button-primary">Shorten</button>
        </div>
    </form>    
</div>
