<?php

namespace App\Policies;

use App\Models\Field;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FieldPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Field $field): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // // return $user->name === 'saleem';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Field $field): bool
    {
        // return $user->id === $form->user_id ?Response:denyWithStatus(404);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Field $field): bool
    {
       
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Field $field): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Field $field): bool
    {
        //
    }
}
