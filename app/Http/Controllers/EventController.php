<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create()
    {
        return view('events.event_create');
    }

    public function store()
    { }
}
