<?php

namespace App\Policies;

use App\Models\AssetReport;
use App\Models\User;

class AssetReportPolicy
{
    public function update(User $user, AssetReport $report)
{
    if ($user->is_admin) {
        return true;
    }

    return $user->id === $report->user_id && $report->status === 'belum_ditanggapi';
}

public function delete(User $user, AssetReport $report)
{
    if ($user->is_admin) {
        return true;
    }

    return $user->id === $report->user_id && $report->status === 'belum_ditanggapi';
}

}
