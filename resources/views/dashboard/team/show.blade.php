@extends('layouts.app')

@section('content')

    @include('dashboard.team.includes.nav', $team)

    <div class="columns is-multiline">
        <div class="column is-3-fullhd is-4-desktop is-6-tablet is-12-mobile has-text-centered">
            <h5 class="title is-5">Projets</h5>
        </div>
        <div class="column is-3-fullhd is-4-desktop is-6-tablet is-12-mobile has-text-centered">
            <h5 class="title is-5">Collaborations</h5>
        </div>
        <div class="column is-3-fullhd is-4-desktop is-6-tablet is-12-mobile has-text-centered">
            <h5 class="title is-5">Documents</h5>
        </div>
        <div class="column is-3-fullhd is-12-desktop is-6-tablet is-12-mobile has-text-centered">
            <h5 class="title is-5">Actualités</h5>
        </div>
    </div>


    <div>
        <div>
            {{ $team->name }}
            <a href="{{ route('team.delete', ['teamId' => $team->id]) }}">test suppr</a>
        </div>
        <div>
            {!! $team->about !!}
        </div>
        ----------
        <div>
            <b>Projects :</b>
        </div>
        <div>
            {{--@foreach($teamProjects as $teamProject)--}}
                {{--<div>--}}
                    {{--{!! $teamProject->title !!}--}}
                    {{--<a href="{{ route('project.show', [$teamId = $team->id, $projectId = $teamProject->id]) }}">Show</a>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        </div>
        ----------
        <div>
            <b>Collabs :</b>
        </div>
        <div>
            {{--@foreach($teamCollabs as $teamCollab)--}}
                {{--<div>--}}
                    {{--{!! $teamCollab->title !!}--}}
                    {{--<a href="{{ route('project.show', [$teamId = $team->id, $projectId = $teamCollab->id]) }}">Show</a>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        </div>
        ----------
        <div>
            {{--{!! $teamCreator->name !!} - {!! $teamCreator->email !!}--}}
        </div>
        <div>
            {{--@foreach($teamUsers as $teamUser)--}}
                {{--<div>--}}
                    {{--{!! $teamUser->name !!} - {!! $teamUser->email !!} ---}}
                    {{--<a href="{{ route('team.user.remove', [$teamId = $team->id, $userId = $teamUser->id]) }}">Remove</a>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        </div>
    </div>
@endsection