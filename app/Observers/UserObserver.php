<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $user->sendEmailVerificationNotification();
    }
    /**
     * Listen to the User updating event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updating(User $user)
    {
        if($user->isDirty('email')){
            // email has changed
            $new_email = $user->email;
//            $old_email = $user->getOriginal('email');
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }
//        if($user->isDirty('password')){
//            $user->password_changed_at = now();
//        }
    }
    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
//        if($user->wasChanged('email')) {
//            $user->email_verified_at = null;
//            $user->save();
//            $user->sendEmailVerificationNotification();
//        }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
