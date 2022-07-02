<?php

namespace App\Filament\Resources\Shop;

use App\Filament\Resources\Shop\CustomerResource\Pages;
use App\Filament\Resources\Shop\CustomerResource\RelationManagers;
use App\Models\User;
use Ariaieboy\FilamentJalaliDatetime\JalaliDateTimeColumn;
use Ariaieboy\FilamentJalaliDatetimepicker\Forms\Components\JalaliDatePicker;
use Ariaieboy\FilamentJalaliDatetimepicker\Forms\Components\JalaliDateTimePicker;
use Filament\Forms;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationGroup;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Morilog\Jalali\Jalalian;

class CustomerResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'shop/customers';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'فروشگاه';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 1;

    public static function getModelLabel(): string
    {
        return "کاربر";
    }

    public static function getPluralModelLabel(): string
    {
        return "کاربران";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('نام کاربری')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label('ایمیل')
                            ->required()
                            ->email()
                            ->unique(User::class, 'email', fn ($record) => $record),
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ]),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('تاریخ ثبت نام')
                            ->content(fn (?User $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('تاریخ ثبت بروزرسانی')
                            ->content(fn (?User $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                    ])
                    ->columnSpan(1),
            ])
            ->columns([
                'sm' => 3,
                'lg' => null,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('نام کاربری')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label("ایمیل")
                    ->searchable()
                    ->sortable(),
                BooleanColumn::make("is_supperUser")
                    ->label("مدیر"),
                JalaliDateTimeColumn::make('created_at')->dateTime()
                    ->label('تاریخ ثبت نام')

            ])
            ->filters([
                Filter::make('is_supperUser')->toggle()->label("کاربر مدیر"),

                Tables\Filters\Filter::make('published_at')
                    ->form([
                        JalaliDatePicker::make('published_from')
                            ->label("ثبت نام از تاریخ")
                            ->placeholder(fn ($state): string => Jalalian::now()->format("d M, Y")),
                        JalaliDatePicker::make('published_until')
                            ->label("ثبت نام تا تاریخ")
                            ->placeholder(fn ($state): string => Jalalian::now()->format("d M, Y")),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['published_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // RelationGroup::make('Shop details', [
            //     RelationManagers\AddressesRelationManager::class,
            //     RelationManagers\PaymentsRelationManager::class,

            // ]),

            RelationGroup::make('دیدگاه ها', [
                RelationManagers\CommentsRelationManager::class,
            ]),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }
}
