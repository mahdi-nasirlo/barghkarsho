<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function getModelLabel(): string
    {
        return "تنظیمات";
    }

    public static function getPluralModelLabel(): string
    {
        return "تنظیمات";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Placeholder::make('name')->label("موقعیت محتوا")->content(fn (Setting $record) => $record ? $record->display_name : "_"),
                    TinyEditor::make("desc")->label('توضیحات')->simple()->disabled()
                ]),
                TinyEditor::make('content')->label("محتوا")->columnSpan([
                    'sm' => 2,
                ]),
                TextInput::make('name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('موقعیت محتوا'),
                TextColumn::make('display_name')->label('موقعیت محتوا'),
                TextColumn::make('content')->html()->label('محتوا')->limit(50),
                TextColumn::make('desc')->label('توضیحات')->html(),
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
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
