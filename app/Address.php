<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    /*protected $fillable = [
        'county', 'city', 'line_1',
    ];*/

    public function user(){
        return $this->belongsTo(User::class);
    }
}
