<?php

namespace App\Http\Livewire;

use App\Models\Shortlink;
use Livewire\Component;

class ShortlinkCard extends Component
{
    public $recentShortLink;
    public $recentUrl;
    public $recentNsfw;
    public $show = false;

    protected $listeners = ['shortlinkCreated'];

    public function shortlinkCreated(Shortlink $shortlink)
    {
        $this->recentShortLink = $shortlink->shortenLink();
        $this->recentUrl = $shortlink->url;
        $this->recentNsfw = $shortlink->nsfw;
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.shortlink-card');
    }
}
