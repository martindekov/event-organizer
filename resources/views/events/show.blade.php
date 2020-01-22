@extends('layouts.app')

@section('title', 'Event')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="text-center pt-3 pb-2 mb-3">
                <h1>{{ $event->name }}</h1>
            </div>

            <div class="float-right">
                <button>Edit</button>
            </div>

            <div class="row">
                <div class="border col-md-6">
                    <div class="container p-3">
                        <p>Event name: {{ $event->name }}</p>
                        <p>Event type: </p>
                        <p>Organizer: {{ $event->organizer }}</p>
                        <p>Date: {{ date( 'F j, Y, H:i', strtotime($event->start_date)) }} </p>
                        <p>Number of people: </p>
                        <p>Menu type: </p>
                        <p>Location: {{ $event->address }}</p>
                        <p>Description: {{ $event->description }} </p>
                    </div>
                </div>
            </div>

            <div class="container pt-3">
                <div class="card p-2">
                    <!-- Write a comment -->
                    <form role="form" method="POST" action="{{ route('comment.store', $event->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="input-group mb-2 mt-2">
                            <div class="input-group-prepend">
                                <img class="rounded-circle" src="{{ asset(auth()->user()->image) }}" style="width:50px; height:50px;" alt="profile picture">
                            </div>
                            <input type="text" class="form-control ml-1 mt-2" name="comment" placeholder="Write a comment...">
                            <div class="input-group-append">
                                <button class="btn-sm btn-outline-success mt-2 mb-2" type="submit">Comment</button>
                            </div>
                        </div>
                    </form>
                    <!--/ Write a comment -->

                    @forelse($comments as $comment)
                    <blockquote class="blockquote">
                        <span class="float-left mt-2">
                            <a href=""><img class="rounded-circle" style="width:50px; height:50px;" src="{{ asset($comment->user->image) }}" alt="..."></a>
                        </span>

                        <p class="mb-0"><a href='#'>{{ $comment->user->username }}</a> {{ $comment->comment }} </p>
                        <footer class="blockquote-footer d-flex flex-row">
                            <div class="mr-2">{{ date( 'F j, Y, g:i a', strtotime($comment->created_at)) }}</div>
                            @if($comment->user_id == auth()->user()->id)
                            <form method="post" action="{{ route('comment.delete', $comment->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                            @endif
                        </footer>
                    </blockquote>
                    @empty
                    <div class="card shadow-lg bg-white mb-3">
                        <div class="card-body text-center">
                            <div class="card-title pt-3 pb-2 mb-2">
                                <h3>This event has no comments yet!</h3>
                            </div>
                        </div>
                    </div>
                    @endforelse
                    <!--/ Users coments -->
                    <div class="col-12 row d-flex justify-content-center">
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection