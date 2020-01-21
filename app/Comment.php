<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    //protected $fillable = [
    //  'user_id', 'event_id', 'comment'
    //];

    protected $table = 'comments';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
