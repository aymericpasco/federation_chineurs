<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamEditFormRequest;
use App\User;
use App\Team;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TeamFormRequest;

class TeamController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Team::class);

        $availableUsers = User::where('team_id', null)->get()->except(Auth::id());
        return view('dashboard.team.create', compact('availableUsers'));
    }

    /**
     * @param TeamFormRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(TeamFormRequest $request)
    {
        $this->authorize('create', Team::class);

        $team = new Team(array(
            'name' => $request->get('name'),
            'facebook_url' => $request->get('facebook_url'),
            'about' => $request->get('about'),
            //'creator_id' =>$request->user()->id,
        ));

        $team->creator()->associate($request->user());
        $team->save();

        $selectedUsers = User::findMany($request->get('availableUsers'));
        foreach ($selectedUsers as $user) {
            $user->activated = true;
            $user->save();
        }

        $team->users()->save($request->user());
        $team->users()->saveMany($selectedUsers);

        return redirect()->route('team.show', ['teamId' => $team->id])->with('status', 'Votre association ' . $team->name . ' a été créée avec succès.');
    }

    /**
     * @param $teamId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($teamId)
    {
        $team = Team::whereId($teamId)->firstOrFail();

        $this->authorize('view', $team);

        return view('dashboard.team.show',
            compact('team'));
    }

    /**
     * @param $teamId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($teamId)
    {
        $team = Team::whereId($teamId)->firstOrFail();

        $this->authorize('update', $team);

        return view('dashboard.team.edit', compact('team'));
    }

    /**
     * @param TeamEditFormRequest $request
     * @param $teamId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(TeamEditFormRequest $request, $teamId)
    {

        $team = Team::whereId($teamId)->firstOrFail();

        $this->authorize('update', $team);

        $team->facebook_url = $request->get('facebook_url');
        $team->about = $request->get('about');

        $team->save();

        return redirect()->route('team.show', ['teamId' => $team->id])
            ->with('status', 'Votre association ' . $team->name . ' a été mise à jour avec succès.');

    }

    /**
     * @param $teamId
     */
    public function destroy($teamId)
    {
        $team = Team::findOrFail($teamId);

        foreach ($team->users as $user)
        {
            $user->team()->dissociate();
            $user->save();
        }

        $team->creator()->dissociate()->save();

        $team->delete();
    }
}
