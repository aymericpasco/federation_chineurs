@extends('layouts.app')

@section('content')

    @include('dashboard.team.includes.nav', $team)
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-7-fullhd is-6-desktop is-12-mobile has-text-centered">
                <h5 class="title is-5">Membres de l'association</h5>
                <table class="table is-narrow is-fullwidth">
                    <thead>
                    <tr>
                        <th>Membres actuels</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach($teamMembers as $member)
                        <tr>
                            <td>
                                <p>
                                    <a href="{{ url('https://facebook.com/' . $member->provider_id) }}" target="_blank">{!! $member->name !!}</a>
                                </p>
                                <p class="has-text-grey is-size-7">
                                    {!! $member->email !!}
                                </p>
                            </td>
                            <td>
                                <a href="{{ route('team.member.remove', ['teamId' => $team->id, 'memberId' => $member->id]) }}">Del</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="column is-5-fullhd is-6-desktop is-12-tablet has-text-centered">
                <h5 class="title is-5">Inviter des utilisateurs</h5>
                <table class="table is-narrow is-fullwidth">
                    <thead>
                    <tr>
                        <th>Utilisateurs disponibles</th>
                        <th>Ajouter à l'association</th>
                    </thead>
                    <tbody>
                    @foreach($availableUsers as $availableUser)
                        <tr>
                            <td>
                                <a href="{{ url('https://facebook.com/' . $availableUser->provider_id) }}" target="_blank">{!! $availableUser->name !!}</a>
                            </td>
                            <td>
                                <a href="{{ route('team.member.add', ['teamId' => $team->id, 'userId' => $availableUser->id]) }}">Add</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection