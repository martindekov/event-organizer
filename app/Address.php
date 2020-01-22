<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id', 'country', 'city', 'zip', 'line_1', 'line_2'
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }
}
