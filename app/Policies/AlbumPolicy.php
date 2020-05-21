<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Album;

class AlbumPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can delete the album.
     *
     * @param  \App\User  $user
     * @param  \App\Album  $album
     * @return mixed
     */
    public function delete(User $user, Album $album)
    {
        return $album->photos->count() < 1;
    }
}
