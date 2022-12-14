<?php

namespace App\Filament\Resources\Shop;

use App\Filament\Resources\Shop\CategoryResource\Pages;
use App\Filament\Resources\Shop\CategoryResource\RelationManagers;
use App\Models\Shop\ShopCategory;
use Ariaieboy\FilamentJalaliDatetime\JalaliDateTimeColumn;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use RalphJSmit\Filament\SEO\SEO;

class CategoryResource extends Resource
{
    protected static ?string $model = ShopCategory::class;

    protected static ?string $slug = 'shop/categories';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'فروشگاه';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 6;

    public static function getModelLabel(): string
    {
        return "دسته بندی محصول";
    }

    public static function getPluralModelLabel(): string
    {
        return "دسته بندی های محصول";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('عنوان')
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', SlugService::createSlug(ShopCategory::class, 'slug', $state == null ? "" : $state))),
                                Forms\Components\TextInput::make('slug')
                                    ->label('نامک')
                                    ->disabled()
                                    ->required()
                                    ->unique(ShopCategory::class, 'slug', fn ($record) => $record),
                            ]),
                        Forms\Components\Select::make('parent_id')
                            ->searchable()
                            ->preload()
                            ->label('دسته بندی پدر')
                            ->relationship('parent', 'name', fn (Builder $query, ?ShopCategory $record) => $query->whereNot('id', $record ? $record->id : null)),
                        Forms\Components\Toggle::make('is_visible')
                            ->label('قابل نمایش برای کاربران.')
                            ->onIcon('heroicon-s-eye')
                            ->offIcon('heroicon-s-eye-off')
                            ->default(true),
                        TinyEditor::make('description')
                            ->label("محتوا")
                            ->columnSpan([
                                'sm' => 2,
                            ]),
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ]),
                Forms\Components\Card::make()
                    ->schema([
                        SEO::make(),
                        Forms\Components\Placeholder::make('created_at')
                            ->label('ساخته شده :')
                            ->content(fn (?ShopCategory $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('بروزرسانی شده:')
                            ->content(fn (?ShopCategory $record) => $record ? $record->updated_at->diffForHumans() : '-')
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
                    ->label('عنوان')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('دسته بندی اصلی')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('is_visible')
                    ->boolean()
                    ->label('عمومی')
                    ->sortable(),
                JalaliDateTimeColumn::make('updated_at')->date()
                    ->label('بروزرسانی در')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
