<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Studant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Studant $studant)
    {
        return $studant->hasPermissionTo('Index-Studant')
            ? $this->allow()
            : $this->deny('This is Cant Index Studant');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Studant  $studant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Studant $studant)
    {
        return $studant->hasPermissionTo('Index-Studant')
            ? $this->allow()
            : $this->deny('This is Cant Index Studant');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Studant $studant)
    {
        return $studant->hasPermissionTo('Create-Studant')
            ? $this->allow()
            : $this->deny('This is Cant Create Studant');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Studant  $studant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Studant $studant)
    {
        return $studant->hasPermissionTo('Edit-Studant')
            ? $this->allow()
            : $this->deny('This is Cant Edit Studant');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Studant  $studant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Studant $studant)
    {
        return $studant->hasPermissionTo('Delete-Studant')
            ? $this->allow()
            : $this->deny('This is Cant Delete Studant');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Studant  $studant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Studant $studant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Studant  $studant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Studant $studant)
    {
        //
    }
}
