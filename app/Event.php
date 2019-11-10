<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    /**
     * Get comments associated with an event.
     */
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    /** Will belong to the user
     * public function user(){
     *     return $this->belongsTo('App\User');
     * }
     */

}
