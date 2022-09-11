<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOrderOverView extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            // totalIncome()
            // totalView()
            Card::make('درامد کل', "1000000"),
            Card::make('تعداد کاربران', User::count()),
            Card::make('بازدید مقالات + دوره ها', "0")
        ];
    }
}
