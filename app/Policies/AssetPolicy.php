<?php

namespace App\Policies;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AssetPolicy
{
    public function viewAny(User $user)
    {
        return true; // Semua user (termasuk yang tidak login) bisa melihat daftar
    }

    public function view(User $user, Asset $asset)
    {
        return true; // Semua user bisa melihat detail asset
    }

    public function create(User $user)
    {
        return $user->is_admin; // Hanya admin bisa create
    }

    public function update(User $user, Asset $asset)
    {
        return $user->is_admin; // Hanya admin bisa update
    }

    public function delete(User $user, Asset $asset)
    {
        return $user->is_admin; // Hanya admin bisa delete
    }
}
