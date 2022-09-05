<?php

namespace App\Filament\Resources\Shop\DiscountItemResource\RelationManagers;

use App\Models\Shop\Course;
use Ariaieboy\FilamentJalaliDatetime\JalaliDateTimeColumn;
use Ariaieboy\FilamentJalaliDatetimepicker\Forms\Components\JalaliDatePicker;
use Ariaieboy\FilamentJalaliDatetimepicker\Forms\Components\JalaliDateTimePicker;
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
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Morilog\Jalali\Jalalian;

class CourseRelationManager extends RelationManager
{
    protected static string $relationship = 'courses';

    protected static ?string $recordTitleAttribute = 'title';

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

                        TextInput::make('price')
                            ->mask(
                                fn (Mask $mask) => $mask
                                    ->numeric()
                                    ->thousandsSeparator(','), // Add a separator for thousands.
                            )
                            ->label('قیمت')
                            ->helperText(fn (Course $record) => $record->discount ? " قیمت دوره با اعمال تخفیف " . number_format($record->discounted_price) . " تومان می باشد. " : "")
                            ->numeric()
                            ->suffix('تومان')
                            ->rules(['integer', 'min:0'])
                            ->required(),

                        Forms\Components\Select::make('discount_id')
                            ->label("تخفیف")
                            ->relationship('discount', 'percent')
                            ->nullable()
                            ->createOptionForm([
                                Forms\Components\Grid::make()
                                    ->schema([
                                        TextInput::make("percent")
                                            ->label("درصد")
                                            ->numeric()
                                            ->maxValue(100)
                                            ->minValue(0)
                                            ->suffix('%')
                                            ->default(0),
                                        JalaliDateTimePicker::make("expired_at")
                                            ->label("تاریخ انقضا")
                                    ])
                                    ->columns([
                                        'sm' => 2,
                                    ])
                                    ->columnSpan([
                                        'sm' => 2,
                                    ]),
                            ]),

                        JalaliDatePicker::make('published_at')
                            ->default(now())
                            ->label('تاریخ انتشار')
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
                TextColumn::make("price")
                    ->label("قیمت")
                    ->html()
                    ->getStateUsing(function (Course $record) {

                        return $record->discountItems
                            ?  '<del style="color: red;" >' . number_format($record->price) . "</del>  " . number_format($record->discounted_price)
                            : number_format($record->price);
                    }),
                Tables\Columns\TextColumn::make('slug')
                    ->label("نامک")
                    ->searchable()
                    ->sortable(),
                TextColumn::make("inventory")->label("ظرفیت"),

                JalaliDateTimeColumn::make('published_at')->date()->label("منتشر شده"),
                JalaliDateTimeColumn::make('created_at')->date()->label("ساخته شده")
            ])
            ->filters([
                Tables\Filters\Filter::make('published_at')
                    ->form([
                        JalaliDatePicker::make('published_from')
                            ->label(" تاریخ انتشار از ")
                            ->placeholder(fn ($state): string => Jalalian::now()->format("d M, Y")),
                        JalaliDatePicker::make('published_until')
                            ->label("تاریخ انتشار از")
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
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AssociateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DissociateAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DissociateBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
