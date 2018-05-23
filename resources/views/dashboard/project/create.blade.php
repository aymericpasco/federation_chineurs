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
                    <legend>Create a new project</legend>
                    <div>
                        <label for="name">Title</label>
                        <div>
                            <input type="text" id="title" placeholder="Title project" name="title">
                        </div>
                    </div>
                    <div>
                        <label for="description" class="col-lg-2 control-label">Description</label>
                        <div>
                            <textarea rows="3" id="description" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="collaborators" class="col-lg-2 control-label">Team collaboration</label>

                        <div>
                            <select id="collaborators" name="collaborators[]" multiple>
                                @foreach($collaborators as $collaborator)
                                    <option value="{!! $collaborator->id !!}">
                                        {!! $collaborator->name !!}
                                    </option>
                                @endforeach
                            </select>
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