<?php

namespace App\Policies\Shop;

use App\Models\User;
use App\Models\Shop\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_shop::cource');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop\Course  $course
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Course $course)
    {
        return $user->can('view_shop::cource');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop\Course  $course
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_shop::cource');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop\Course  $course
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Course $course)
    {
        return $user->can('update_shop::cource');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop\Course  $course
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Course $course)
    {
        return $user->can('delete_shop::cource');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_shop::cource');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop\Course  $course
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Course $course)
    {
        return $user->can('force_delete_shop::cource');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_shop::cource');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop\Course  $course
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Course $course)
    {
        return $user->can('restore_shop::cource');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_shop::cource');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop\Course  $course
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Course $course)
    {
        return $user->can('replicate_shop::cource');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop\Course  $course
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user, Course $course)
    {
        return $user->can('reorder_shop::cource');
    }

}