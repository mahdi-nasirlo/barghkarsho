<?php

namespace App\Filament\Resources\Service;

use App\Filament\Resources\Service\ServiceRequestResource\Pages;
use App\Filament\Resources\Service\ServiceRequestResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

class ServiceRequestResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $slug = 'service/items/request';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'خدمات';

    protected static ?int $navigationSort = 0;

    protected static ?string $inverseRelationship = 'section';

    public static function getModelLabel(): string
    {
        return "درخواست خدمات";
    }

    public static function getPluralModelLabel(): string
    {
        return "درخواست های خدمات";
    }

    protected static function getNavigationBadge(): ?string
    {
        return Service::all()->where("status", false)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")->label("نام"),
                TextColumn::make("mobile")->label("شماره همراه"),
                TextColumn::make("items.name")->label("سرویس"),
                TextColumn::make("message")->label("پیام"),
                BooleanColumn::make("status")->label("وضعیت رسیدگی")
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make("رسیدگی_شد")
                    ->action(function (Service $record) {
                        if (!$record->status) {
                            Notification::make()
                                ->title('وضعیت رسیدگی درخواست به "رسیدگی شد" تغییر کرد')
                                ->success()
                                ->send();
                        } else {
                            Notification::make()
                                ->warning()
                                ->title("وضعیت قبلا تغییر کرده است")
                                ->send();
                        }

                        $record->update(['status' => true]);
                    })->requiresConfirmation()
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
            'index' => Pages\ListServiceRequests::route('/'),
        ];
    }
}
