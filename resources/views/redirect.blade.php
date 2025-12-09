{!! session('redirect_message') !!}

<div class="alert alert-info">
    {{ session('redirect_info') }}
</div>

<meta http-equiv="refresh" content="{{ $seconds }};url={{ $url }}">
{{-- <p>You will be redirected in {{ $seconds }} seconds. If not, click <a href="{{ $url }}">here</a>.</p> --}}