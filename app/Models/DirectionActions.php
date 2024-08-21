<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectionActions extends Model
{
    use HasFactory;

    protected $table = 'direction_actions';


    public function getCodeNameAttribute(): string
    {
        return $this->attributes['code']. " - " . $this->attributes['name'];
    }
}
