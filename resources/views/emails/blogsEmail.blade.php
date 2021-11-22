@component('mail::message')
# Admin InfoNews

<h2>{{ $details['title'] }}</h2>
<p class="mb-2 mt-2">{{ $details['body'] }}</p>

<img src="{{ $details['image'] }}">
    
@endcomponent
<p class="mt-3">{{ $details['description'] }}</p>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/blog/detail/' . $details['slug']])
Selengkapnya
@endcomponent

Thanks,<br>
Aldian dwi
@endcomponent

