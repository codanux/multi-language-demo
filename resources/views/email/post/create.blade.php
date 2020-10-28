@component('mail::message')
# {!! $post->name !!}

{{ $post->body }}

@component('mail::button', ['url' => routeLocalized('post.show', [$post->category, $post])])
Post Görüntüle
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
