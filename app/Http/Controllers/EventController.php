<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Comment;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('profile.approved')->with('events', $events);
    }

    public function approve($id){
        $event = Event::all()->where('id',$id)->first();
        $event->approved = true;
        $event->save();
        return redirect()->back(); 
    }

    public function approved()
    {
        $events = array();
            if (Auth::user()->organizer){
            $event_ids = json_decode(Auth::user()->event_organizer);
            if ($event_ids == null){
                return view('profile.waiting')->with('events', null);
            }
            foreach($event_ids as $event_id){
                $the_event = Event::all()
                ->where('id','=',$event_id)
                ->where('approved','=',true)
                ->first();
                if($the_event!=null){
                    array_push($events, $the_event);
                }
            }
        }else{
            $event_ids = json_decode(Auth::user()->event_client);
            if ($event_ids == null){
                return view('profile.waiting')->with('events', null);
            }
            foreach($event_ids as $event_id){
                $the_event = Event::all()
                ->where('id','=',$event_id)
                ->where('approved','=',true)
                ->first();
                if($the_event!=null){
                    array_push($events, $the_event);
                }
            }
        }
        return view('profile.approved')->with('events', $events);
    }

    public function waiting()
    {
        $events = array();
            if (Auth::user()->organizer){
            $event_ids = json_decode(Auth::user()->event_organizer);
            if ($event_ids == null){
                return view('profile.waiting')->with('events', null);
            }
            foreach($event_ids as $event_id){
                $the_event = Event::all()
                ->where('id','=',$event_id)
                ->where('approved','=',false)
                ->first();
                if($the_event!=null){
                    array_push($events, $the_event);
                }
            }
        }else{
            $event_ids = json_decode(Auth::user()->event_client);
            if ($event_ids == null){
                return view('profile.waiting')->with('events', null);
            }
            foreach($event_ids as $event_id){
                $the_event = Event::all()
                ->where('id','=',$event_id)
                ->where('approved','=',false)
                ->first();
                if($the_event!=null){
                    array_push($events, $the_event);
                }
            }
        }
        return view('profile.waiting')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()) {
            $users = User::all()->where('organizer', true);
            return view('events.create')->with('users', $users);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('success', 'You have successfully created an event request please wait for response from the organizer!');

        $event = Event::create([
            'address' =>  $request['event_address'],
            'organizer' => $request['organizer'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'client' => Auth::user()->username,
            'name' => $request['event_name'],
            'description' => $request['event_description'],
            'approved' => false,
        ]);

        $organizer_user = User::all()->where('username',$request['organizer'])->first();
        $this->save_organizer_event($organizer_user, $event);

        $client_user = User::all()->where('username',Auth::user()->username)->first();
        $this->save_client_event($client_user,$event);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $comments = Comment::where('event_id', $event->id)->latest()->paginate(5);
        return view('events.show', compact('event', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function save_organizer_event($user,$event)
    {
        if ($user->event_organizer == null){
            $user->event_organizer = json_encode(array($event->id));
        }else{
            $array_events = json_decode($user->event_organizer,true);
            array_push($array_events,$event->id);
            $user->event_organizer = json_encode($array_events);
        }
        $user->save();
    }
    

    private function save_client_event($user,$event)
    {
        if ($user->event_client == null){
            $user->event_client = json_encode(array($event->id));
        }else{
            $array_events = json_decode($user->event_client,true);
            array_push($array_events,$event->id);
            $user->event_client = json_encode($array_events);
        }
        $user->save();
    }
}
