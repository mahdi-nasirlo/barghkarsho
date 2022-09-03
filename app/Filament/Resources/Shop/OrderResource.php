<?php

namespace App\Filament\Resources\Shop;

use App\Filament\Resources\Shop\OrderResource\Pages;
use App\Filament\Resources\Shop\OrderResource\Pages\ViewOrder;
use App\Models\Order;
use Filament\Forms;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;


class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $slug = 'shop/orders';

    protected static ?string $recordTitleAttribute = 'tracking_serial';

    protected static ?string $navigationGroup = 'فروشگاه';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?int $navigationSort = 2;

    protected static ?string $inverseRelationship = 'section';

    public static function getModelLabel(): string
    {
        return "سفارش";
    }

    public static function getPluralModelLabel(): string
    {
        return "سفارشات";
    }


    protected static function getNavigationBadge(): ?string
    {
        return Order::all()->where("status", "paid")->count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make("status")
                    ->label("وضعیت")
                    ->options([
                        'unpaid' => 'درحال پرداخت',
                        'paid' => 'پرداخت موفق',
                        'preparation' => 'آماده سازی',
                        "posted" => "ارسال شده",
                        "received" => "دریافت شده"
                    ])
                    ->visibleOn('edit'),
                TextInput::make("tracking_serial")->label("کد پیگیری پست")->visible("edit"),

                Fieldset::make("جزئیات سفارش")
                    ->schema([
                        Repeater::make('courses')
                            ->label("دوره ها")
                            ->relationship()
                            ->schema([
                                TextInput::make('title')->label("عنوان دوره"),
                                TextInput::make("price")->label("قیمت دوره در حال حاضر")
                                    ->mask(
                                        fn (Mask $mask) => $mask
                                            ->numeric()
                                            ->thousandsSeparator(','), // Add a separator for thousands.
                                    ),
                                FileUpload::make("image")->label("کاور"),
                            ])
                    ])
                    ->columns(2)
                    ->visibleOn("view")
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("tracking_serial")->label("کد پیگیری پست"),
                TextColumn::make("user.name")->label("کاربر"),
                TextColumn::make("price")
                    ->label("مبلغ")
                    ->formatStateUsing(fn (string $state): string => number_format($state) . " تومان"),
                TextColumn::make("status")
                    ->label("وضعیت")
                    ->enum(
                        [
                            'unpaid' => 'درحال پرداخت',
                            'paid' => 'پرداخت موفق',
                            'preparation' => 'آماده سازی',
                            "posted" => "ارسال شده",
                            "received" => "دریافت شده"
                        ]
                    ),
                TextColumn::make("user.city")
                    ->label("شهر"),
                TextColumn::make("user.state")
                    ->label("استان"),
                TextColumn::make("user.address")
                    ->label("آدرس")
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label("تغییر وضعیت"),
                Action::make('view')
                    ->label("جزئیات")
                    ->color('info')
                    ->icon('heroicon-o-eye')
                    ->url(fn (Order $record): string => route('filament.resources.shop/orders.view', $record)),
                Action::make('address')
                    ->label("اطلاعات پست")
                    ->color('success')
                    ->url(fn (Order $record): string => route("filament.resources.shop/customers.edit", $record->user))
            ]);
    }

    protected function getTableActions(): array
    {
        return [
            // ...
        ];
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
            'index' => Pages\ListOrders::route('/'),
            "view" => ViewOrder::route("/{record}")
        ];
    }
}