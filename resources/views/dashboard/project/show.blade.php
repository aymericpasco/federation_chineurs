@extends('layouts.app')

@section('content')
    <div>
        <div>
            {{ $project->title }}
        </div>
        <div>
            {!! $project->description !!}
        </div>
        ----------
        <div>
            created by : {!! $project->owner->name !!}
        </div>
        ----------
        <div>collaborators :</div>
        @foreach($project->collaborators as $collaborator)
            <div>- {!! $collaborator->name !!}</div>
        @endforeach
    </div>
@endsection