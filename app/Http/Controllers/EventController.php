<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;

class EventController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('events.event_create')->with('users', $users);
    }

    public function store()
    { }
}
