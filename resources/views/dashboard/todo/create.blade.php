@extends('layouts.app')

@section('content')
    <div>
        <div>

            <form method="post">

                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div>
                        {{ session('status') }}
                    </div>
                @endif

                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <fieldset>
                    <legend>Create a new todo</legend>
                    <div>
                        <label for="title">Title</label>
                        <div>
                            <input type="text" id="title" placeholder="Title of new todo" name="title">
                        </div>
                    </div>
                    <div>
                        <div>
                            <button type="reset">Cancel</button>
                            <button type="submit">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection