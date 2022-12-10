<?php

namespace App\Filament\Resources\Shop;

use App\Filament\Resources\Shop\DiscountItemResource\Pages;
use App\Filament\Resources\Shop\DiscountItemResource\RelationManagers;
use App\Models\Order;
use App\Models\Shop\DiscountItem;
use Ariaieboy\FilamentJalaliDatetime\JalaliDateTimeColumn;
use Ariaieboy\FilamentJalaliDatetimepicker\Forms\Components\JalaliDateTimePicker;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class DiscountItemResource extends Resource
{
    protected static ?string $model = DiscountItem::class;

    protected static ?string $slug = "shop/discount_item";

    protected static ?string $recordTitleAttribute = 'code';

    protected static ?string $navigationGroup = 'تخفیف %';

    protected static ?string $navigationIcon = 'heroicon-o-gift';



    public static function getModelLabel(): string
    {
        return "تخفیف موردی";
    }

    public static function getPluralModelLabel(): string
    {
        return "تخفیفات موردی";
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        TextInput::make("percent")
                            ->required()
                            ->label("درصد")
                            ->numeric()
                            ->maxValue(100)
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
                TextColumn::make("percent")
                    ->label("درصد")
                    ->sortable(),
                JalaliDateTimeColumn::make('expired_at')
                    ->dateTime()
                    ->label('تاریخ انقضا')
                    ->sortable()
            ])
            ->filters([
                //
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
            'index' => Pages\ListDiscountItems::route('/'),
            'create' => Pages\CreateDiscountItem::route('/create'),
            'edit' => Pages\EditDiscountItem::route('/{record}/edit'),
        ];
    }
}
