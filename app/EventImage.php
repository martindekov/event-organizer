<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    protected $guarded = [];
   
    protected $table = 'event_images';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
