<?php

namespace App\Filament\Resources\Shop;

use App\Filament\Resources\Shop\PaymentResource\Pages;
use App\Filament\Resources\Shop\PaymentResource\RelationManagers;
use App\Models\MyPayment;
use App\Models\Shop\Payment;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = MyPayment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $recordTitleAttribute = 'resnumber';

    protected static ?string $navigationGroup = 'فروشگاه';

    protected static ?int $navigationSort = 2;

    protected static ?string $inverseRelationship = 'section';

    public static function getModelLabel(): string
    {
        return "تراکنش";
    }

    public static function getPluralModelLabel(): string
    {
        return "تراکنش ها";
    }


    protected static function getNavigationBadge(): ?string
    {
        return MyPayment::all()->where("status", true)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("resnumber")
                    ->label("کد رهگیری بانک")->searchable(),
                TextColumn::make("order.price")->label("مبلغ")->searchable()->sortable()
                    ->formatStateUsing(fn (string $state): string => number_format($state) . " تومان"),
                TextColumn::make("order.user.name")
                    ->label("کاربر")
                    ->url(fn (MyPayment $record): string => route("filament.resources.shop/customers.edit", $record->order->user)),
                BooleanColumn::make("status")->label("وضعیت پرداخت")->sortable()

            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
        ];
    }
}
