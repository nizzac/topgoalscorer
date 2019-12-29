<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $dates = ['start_date', 'end_date'];

    public function players()
    {
        return $this->belongsToMany(Player::class)->withPivot(['games', 'goals', 'keeper']);
    }
}
