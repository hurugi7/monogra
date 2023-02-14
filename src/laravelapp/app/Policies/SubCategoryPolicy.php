<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubCategoryPolicy
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

    public function view(User $user, SubCategory $sub_category)
    {
        return $user->id === $sub_category->user_id;
    }
}
