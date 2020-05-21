<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Category;

class CategoryPolicy
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
     * Determine whether the user can delete the Category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return $category->plans->count() < 1;
    }
}
