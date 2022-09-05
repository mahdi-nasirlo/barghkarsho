<?php

namespace App\Filament\Resources\Shop;

use App\Filament\Resources\Shop\DiscountResource\Pages;
use App\Filament\Resources\Shop\DiscountResource\RelationManagers;
use App\Models\Shop\Discount;
use Ariaieboy\FilamentJalaliDatetime\JalaliDateTimeColumn;
use Ariaieboy\FilamentJalaliDatetimepicker\Forms\Components\JalaliDateTimePicker;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;


    protected static ?string $recordTitleAttribute = 'code';

    protected static ?string $navigationGroup = 'تخفیف %';

    protected static ?string $navigationIcon = 'heroicon-o-gift';



    public static function getModelLabel(): string
    {
        return "کد تخفیف";
    }

    public static function getPluralModelLabel(): string
    {
        return "کدهای تخفیف";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        TextInput::make("code")
                            ->label("کد تخفیف")
                            ->required(),
                        TextInput::make("percent")
                            ->label("درصد")
                            ->numeric()
                            ->maxValue(100)
                            ->required()
                            ->minValue(0)
                            ->suffix('%')
                            ->default(0),
                        JalaliDateTimePicker::make("expired_at")
                            ->required()
                            ->label("تاریخ انقضا")
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("code")
                    ->label("کد تخفیف")
                    ->searchable(),
                TextColumn::make("percent")
                    ->label("درصد")
                    ->sortable(),
                JalaliDateTimeColumn::make('expired_at')
                    ->dateTime()
                    ->label('تاریخ انقضا')
                    ->sortable()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscount::route('/create'),
            'edit' => Pages\EditDiscount::route('/{record}/edit'),
        ];
    }
}
