<?php

namespace App\Filament\Resources\Shop;

use App\Filament\Resources\Shop\CourceResource\RelationManagers\CommentsRelationManager;
use App\Filament\Resources\Shop\CourceResource\Pages;
use App\Models\Course;
use Ariaieboy\FilamentJalaliDatetimepicker\Forms\Components\JalaliDatePicker;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class CourceResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $slug = 'shop/courses';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'فروشگاه';

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?int $navigationSort = 2;

    protected static ?string $inverseRelationship = 'section';

    public static function getModelLabel(): string
    {
        return "دوره";
    }

    public static function getPluralModelLabel(): string
    {
        return "دوره ها";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Hidden::make('user_id')->default(auth()->user()->id),
                        Forms\Components\TextInput::make('title')
                            ->label("عنوان")
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', SlugService::createSlug(Course::class, 'slug', $state == null ? "" : $state))),
                        Forms\Components\TextInput::make('slug')
                            ->label("نامک (URL)")
                            // ->disabled()
                            ->required()
                            ->unique(Course::class, 'slug', fn ($record) => $record),
                        TinyEditor::make('desc')
                            ->label("محتوا")
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                            ]),
                        Textarea::make("short_desc")
                            ->label("توضیح کوتاه")
                            ->required()
                            ->columnSpan(['sm' => 2]),

                        // Hidden::make("blog_author_id")->default(auth()->user()->id),
                        // Forms\Components\Select::make('blog_category_id')
                        //     ->label("دسته بندی")
                        //     ->relationship('category', 'name')
                        //     ->searchable()
                        //     ->required(),
                        JalaliDatePicker::make('published_at')
                            ->default(now())
                            ->label('تاریخ انتشار')
                            ->required(),

                        TextInput::make('price')
                            ->mask(
                                fn (Mask $mask) => $mask
                                    ->numeric()
                                    ->thousandsSeparator(','), // Add a separator for thousands.
                            )
                            ->label('قیمت')
                            ->helperText('این مورد برای کاربر قابل مشاهده نخواهد بود.')
                            ->numeric()
                            ->suffix('تومان')
                            ->rules(['integer', 'min:0'])
                            ->required(),
                        TextInput::make('inventory')
                            ->label('ظرفیت')
                            ->numeric()
                            ->rules(['integer', 'min:0'])
                            ->required(),
                        SpatieTagsInput::make('tags')
                            ->label('تگ ها')
                            ->required(),
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ]),
                Forms\Components\Card::make()
                    ->schema([
                        FileUpload::make('image')
                            ->required()
                            ->label('عکس شاخص')
                            ->image(),

                        Forms\Components\Placeholder::make('created_at')
                            ->label('ساخته شده :')
                            ->content(fn (?Course $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('بروزرسانی شده:')
                            ->content(fn (?Course $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                    ])
                    ->columnSpan(1),
                Repeater::make('commonQuestions')
                    ->schema([
                        TextInput::make('question')
                            ->label("سوال")
                            ->required(),
                        Textarea::make('answer')
                            ->label("پاسخ")
                            ->cols(10)
                            ->required(),
                    ])
                    ->relationship()
                    ->orderable("sort")
                    ->label("پرسش متداول")
                    ->columns([
                        'sm' => 1,
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ]),
                Card::make()
                    ->columnSpan([
                        'sm' => 2,
                    ])
                    ->schema([
                        Repeater::make('attributes')
                            ->schema([
                                TextInput::make('attribute')
                                    ->label("سر فصل ها")
                                    ->required(),
                            ])
                            ->relationship()
                            ->required()
                            ->label("مبحث")
                            ->columns([
                                'sm' => 1,
                            ])
                            ->columnSpan([
                                'sm' => 2,
                            ]),
                    ])
            ])
            ->columns([
                'md' => 3,
                'lg' => null,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('عکس شاخص'),

                Tables\Columns\TextColumn::make('title')
                    ->label("عنوان")
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('view')
                    ->label("بازدید")
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label("نامک")
                    ->searchable()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('author.name')
                //     ->label("نویسنده")
                //     ->searchable()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('category.name')
                //     ->label("دسته بندی")
                //     ->searchable()
                //     ->sortable(),
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
            CommentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCources::route('/'),
            'create' => Pages\CreateCource::route('/create'),
            'edit' => Pages\EditCource::route('/{record}/edit'),
        ];
    }
}
