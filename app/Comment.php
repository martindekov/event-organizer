<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function event(){
        return $this->belongsTo('App\Event');
    }

    /** Will belong to user as above
     * public function user(){
     *     return $this->belongsTo('App\User');
     * }
     */
}
