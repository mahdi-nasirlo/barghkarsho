<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Page;
use App\Models\Shop\Product;
use App\Models\Shop\ShopCategory;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\HtmlString;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('نام بنر')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('alt')
                            ->label('توضیحات بنر')
                            ->hint('*سئو*')
                            ->hintColor('danger')
                            ->maxLength(255),

                        Select::make('collection')
                            ->required()
                            ->reactive()
                            ->label('نوع بنر ( محل قرار گیری )')
                            ->options([
                                'carousel' => 'بنر کروسل',
                                'small-banner' => 'بنر کوچک',
                                'medium-banner' => 'بنر های متوسط',
                                'categories-banner' =>  'بنر دسته بندی'
                            ]),

                        Placeholder::make('توجه:')
                            ->reactive()
                            ->hidden(fn (Closure $get) => !($get('collection') == 'small-banner' and Banner::where('collection', 'small-banner')->count() > 0))
                            ->content(new HtmlString("<p style='color:red;'>
                                قابل توجه شما قبلا یک بنر کوچک ایجاد شده است با ایجاد این بنر ، بنر قبلی دیگر نمایش داده نمی شود .
                                </p>")),

                        MorphToSelect::make('bannerable')
                            ->reactive()
                            ->required(fn (Closure $get) => $get('collection') == 'categories-banner')
                            ->preload()
                            ->label(fn (Closure $get) => $get('collection') == 'categories-banner' ?
                                'لینک دسته بندی محصول یا خود محصول' :
                                'لینک به صفحه ی مورد نظر')
                            ->searchable()
                            ->types(fn (Closure $get) => static::bannerType($get('collection'))),

                        FileUpload::make('path')
                            ->label('عکس بنر')
                            ->required(),
                    ])
            ]);
    }

    public static function bannerType($collection)
    {
        if ($collection == 'categories-banner') {
            return [
                MorphToSelect\Type::make(ShopCategory::class)
                    ->label('دسته بندی محصول')
                    ->titleColumnName('name')
                    ->getOptionLabelFromRecordUsing(fn (ShopCategory $record): string => "{$record->name}  ----  {$record->slug}"),
            ];
        } else
            return [
                MorphToSelect\Type::make(Page::class)
                    ->label('صفحه')
                    ->titleColumnName('name')
                    ->getOptionLabelFromRecordUsing(fn (Page $record): string => "{$record->name}  ----  {$record->slug}"),

                MorphToSelect\Type::make(Product::class)
                    ->label('محصول')
                    ->titleColumnName('name')
                    ->getOptionLabelFromRecordUsing(fn (Product $record): string => "{$record->name}  ----  {$record->slug}"),

                MorphToSelect\Type::make(ShopCategory::class)
                    ->label('دسته بندی محصول')
                    ->titleColumnName('name')
                    ->getOptionLabelFromRecordUsing(fn (ShopCategory $record): string => "{$record->name}  ----  {$record->slug}"),

                MorphToSelect\Type::make(Post::class)
                    ->getOptionLabelFromRecordUsing(fn (Post $record): string => "{$record->title}  ----  {$record->slug}")
                    ->label('مقالات')
                    ->titleColumnName('title'),

                MorphToSelect\Type::make(Category::class)
                    ->getOptionLabelFromRecordUsing(fn (Category $record): string => "{$record->name}  ----  {$record->slug}")
                    ->label('دسته بندی مقالات')
                    ->titleColumnName('name')
            ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('alt'),
                ImageColumn::make('path'),
                Tables\Columns\TextColumn::make('bannerable_type'),
                Tables\Columns\TextColumn::make('bannerable_id'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
