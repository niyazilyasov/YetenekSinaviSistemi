<?php

namespace App\Traits;
trait MustChangePassword
{
    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasChangedPassword()
    {
        return ! is_null($this->password_changed_at);
    }

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markPasswordAsChanged()
    {
        return $this->forceFill([
            'password_changed_at' => $this->freshTimestamp(),
        ])->save();
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

}
