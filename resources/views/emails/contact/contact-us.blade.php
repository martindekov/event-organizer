@component('mail::message')
<div>
    <div class="text-center pt-3 pb-2 mb-3">
        <h1>{{ __('Contact Us') }}</h1>
    </div>

    <div class="text-center pt-3 pb-2 mb-3">

        <p>From:
            {{ $data['email'] }} </p>
    </div>
    <div class="pt-3 pb-2 mb-3">
        <p>Subject: {{ $data['subject'] }}</p>
    </div>
    <div class="pt-3 pb-2 mb-3">
        <p>Message:</p>
        <p>{{ $data['mailMessege'] }} </p>
    </div>
</div>
@endcomponent