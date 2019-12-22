<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function address()
    { 
        return $this->belongsTo(Address::class, 'address_id');
    }

    //public function eventType()
    //{ 
    //    return $this->belongsTo(EventType::class, 'event_type_id');
    //}

    //public function menuType()
    //{ 
    //    return $this->belongsTo(MenuType::class, 'menu_type_id');
    //}

}
