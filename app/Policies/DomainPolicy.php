<?php

namespace App\Policies;

use App\Models\Domain;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DomainPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Domain  $domain
     * @return mixed
     */
    public function view(User $user, Domain $domain)
    {
        return $user->belongsToTeam($domain->team);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasTeamRole($user->currentTeam, 'editor') || $user->hasTeamRole($user->currentTeam, 'admin');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Domain  $domain
     * @return mixed
     */
    public function update(User $user, Domain $domain)
    {
        return $user->hasTeamRole($domain->team, 'editor') || $user->hasTeamRole($user->currentTeam, 'admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Domain  $domain
     * @return mixed
     */
    public function delete(User $user, Domain $domain)
    {
        return $user->hasTeamRole($domain->team, 'admin') || $user->hasTeamRole($user->currentTeam, 'admin');
    }
}
