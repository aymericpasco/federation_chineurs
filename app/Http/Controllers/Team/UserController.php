<?php

namespace App\Http\Controllers\Team;

use App\User;
use App\Team;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * List all members of the team and also available users to add them
     *
     * @param $teamId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function members($teamId) {

        $team = Team::whereId($teamId)->firstOrFail();

        $this->authorize('view', $team);

        $availableUsers = User::where('team_id', null)->get();
        $teamMembers = User::where('activated', true)
            ->where('team_id', $teamId)
            ->get();

        return view('dashboard.team.members', compact('teamMembers', 'availableUsers', 'team'));
    }

    /**
     * Remove a user from the team
     *
     * @param $teamId
     * @param $memberId
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function remove($teamId, $memberId) {

        $team = Team::whereId($teamId)->firstOrFail();

        $this->authorize('update', $team);

        $memberToRemove = User::whereId($memberId)->where('team_id', $teamId)->firstOrFail();

        if ($team->creator_id === $memberToRemove->id) {
            return redirect()->route('team.members', ['teamId' => $team->id])
                ->withErrors( 'Action impossible.');
        } else {
            $memberToRemove->team()->dissociate($team)->save();
            return redirect()->route('team.members.list', ['teamId' => $team->id])
                ->with('status', $memberToRemove->name . ' a bien été retiré de votre association !');
        }
    }

    /**
     * Add a user to the team by add link
     *
     * @param $teamId
     * @param $userId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function add($teamId, $userId) {
        $team = Team::whereId($teamId)->firstOrFail();

        $this->authorize('update', $team);

        $user = User::whereId($userId)->where('team_id', null)->firstOrFail();

        if (!$user->activated) {
            $user->activated = true;
        }

        $user->team()->associate($team);
        $user->save();

        return redirect()->route('team.members.list', ['teamId' => $team->id])
            ->with('status', $user->name . ' a bien été ajouté à votre association !');
    }

}
