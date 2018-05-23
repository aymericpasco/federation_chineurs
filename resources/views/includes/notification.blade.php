@if($errors->all())
    <div class="notification is-danger has-text-centered">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (session('status'))
    <div class="notification is-success has-text-centered">
        {{ session('status') }}
    </div>
@endif