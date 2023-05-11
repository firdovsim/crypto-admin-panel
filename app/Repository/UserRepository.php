<?php

namespace App\Repository;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class UserRepository
{
    public function getUsersIdsWhichCurrentlyWorking(): Collection|array
    {
        $timeNow = Carbon::now();
        return User::query()
            ->where('is_working', true)
            ->whereTime('start_time', '<', $timeNow)
            ->whereTime('finish_time', '>', $timeNow)
            ->latest('id')
            ->pluck('id');
    }

    public function getWorkingUsersWithCryptosByIds(array|Collection $ids): Collection
    {
        return User::query()
            ->whereIn('id', $ids)
            ->with('cryptos')
            ->with('cryptos.ticker.indicator', 'cryptos.ticker.tickerPrecise')
            ->latest('id')
            ->get();
    }
}
