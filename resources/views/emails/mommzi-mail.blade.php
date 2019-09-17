@component('mail::message',['color' => 'blue'])
# {{ $content['title'] }}


{{ $content['message'] }}


@component('mail::button', ['url' =>$content['from'],'color' => 'green'])
    {{ $content['from']}}
@endcomponent

{{ $content['tel'] }}
    Thanks,

    {{ config('app.name') }}
@endcomponent