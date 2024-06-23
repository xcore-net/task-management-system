<?php

namespace App\Policies;

use App\Models\Form;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FormPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    

    /**
     * Determine whether the user can view the model.
     */
   

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->name === 'saleem';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Form $form): Response
    {
        
    return $user->id === $form->user_id ? Response::allow() : Response::denyWithStatus(404);
              
             
    }

    /**
     * Determine whether the user can delete the model.
     */
    

    /**
     * Determine whether the user can restore the model.
     */
   

    /**
     * Determine whether the user can permanently delete the model.
     */
  
}
