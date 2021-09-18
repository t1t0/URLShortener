<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortlink extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'url',
        'visits',
        'nsfw'
    ];

    public function shortenLink()
    {
        return env('APP_URL').'/'.$this->code;
    }

    public function linkData()
    {
        return $data = [
            'shortlink' => $this->shortenLink(),
            'url' => $this->url,
            'nsfw' => $this->nsfw,
            'visits' => $this->visits
        ];
    }
}
