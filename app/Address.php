<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    /*protected $fillable = [
        'county', 'city', 'zip', 'line_1', 'line_2',
    ];*/

    public function user(){
        return $this->belongsTo(User::class);
    }
}
