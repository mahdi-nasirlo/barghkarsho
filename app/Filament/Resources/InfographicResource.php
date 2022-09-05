<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfographicResource\Pages;
use App\Filament\Resources\InfographicResource\Pages\EditInfographic;
use App\Filament\Resources\InfographicResource\Pages\ListInfographics;
use App\Models\Infographic;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class InfographicResource extends Resource
{
    protected static ?string $model = Infographic::class;

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
                    Placeholder::make('name')->label("موقعیت محتوا")->content(fn (Infographic $record) => $record ? $record->display_name : "_"),
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
                TextColumn::make('name')->label('موقعیت محتوا')->searchable()->sortable(),
                TextColumn::make('display_name')->label('موقعیت محتوا')->searchable()->sortable(),
                TextColumn::make('content')->html()->label('محتوا')->limit(50)->sortable()->searchable(),
                TextColumn::make('desc')->label('توضیحات')->html()->sortable()->searchable(),
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
            'index' => ListInfographics::route('/'),
            'edit' => EditInfographic::route('/{record}/edit'),
        ];
    }
}
