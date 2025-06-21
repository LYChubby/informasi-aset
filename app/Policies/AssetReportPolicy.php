<?php

namespace App\Policies;

use App\Models\AssetReport;
use App\Models\User;

class AssetReportPolicy
{
    public function delete(User $user, AssetReport $report): bool
    {
        return $user->role === 'admin' || $user->id === $report->user_id;
    }

    public function update(User $user, AssetReport $report): bool
    {
        return $user->role === 'admin' || $user->id === $report->user_id;
    }
}
