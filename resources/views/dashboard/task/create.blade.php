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
                    <legend>Create a new task</legend>
                    <div>
                        <label for="name">Name</label>
                        <div>
                            <input type="text" id="name" placeholder="name of new task" name="name">
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