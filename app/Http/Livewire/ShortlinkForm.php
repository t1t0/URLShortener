<?php

namespace App\Http\Livewire;

use App\Models\Shortlink;
use Illuminate\Support\Str;
use Livewire\Component;

class ShortlinkForm extends Component
{

    public $url;
    public $nsfw;
    public $shortlink;

    protected $rules = [
        'url' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
    ];

    public function createShortlink(){
        $this->validate();

        $this->nsfw ? $nsfw = true : $nsfw = false;

        $shortLink = Shortlink::firstOrCreate([
            'code' => Str::random(8),
            'url' => $this->url,
            'nsfw' => $nsfw
        ]);

        $this->emit('shortlinkCreated', $shortLink->id);
    }

    public function render()
    {
        return view('livewire.shortlink-form');
    }
}
