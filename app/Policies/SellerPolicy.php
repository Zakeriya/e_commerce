<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class SellerPolicy
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
    public function view(User $user, Seller $seller): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin): bool
    {
        return Auth::guard('admin')->check() && $admin->hasRole('Creator')?
         Response::allow()
        : Response::deny('You Can Not Add Sellers ');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Seller $seller): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, Seller $seller): bool
    {

        return Auth::guard('damin')->check() && $admin->hasRole('Editor')
                ? Response::allow()
                : Response::deny('You Can Delete Sellers ');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Seller $seller): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Seller $seller): bool
    {
        //
    }
}
