<?php

namespace App\Filament\Pages;

use App\Models\Banner as ModelsBanner;
use Filament\Facades\Filament;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Banner extends Page
{
    public ModelsBanner $banner;

    public $user;
    public $userData;
    // Password
    public $new_password;
    public $new_password_confirmation;
    // Sanctum tokens
    public $token_name;
    public $abilities = [];
    public $plain_text_token;
    protected $loginColumn;
    public $carousel;

    public $name;
    public $path;
    public $alt;

    // public $carousel;

    public function boot()
    {
        // user column
        $this->loginColumn = config('filament-breezy.fallback_login_field');
    }

    public function mount()
    {
        $this->user = Filament::auth()->user();
        $this->carousel = ModelsBanner::all(['name', 'path', 'alt'])->toArray();
        // dd($this->carousel);
        // $this->name = "jdslkafj";
        // dd(ModelsBanner::all(['name', 'path', 'alt'])->toArray());
        // $this->updateCarouselForm->fill(
        //     ModelsBanner::all(['name', 'path', 'alt'])->toArray()[0]
        // );
        // $this->updateCarouselForm->fill(ModelsBanner::all()->toArray());
        // dd();
    }

    protected function getForms(): array
    {
        return array_merge(parent::getForms(), [
            // "updateCarouselForm" => $this->makeForm()
            //     // ->model(config('filament-breezy.user_model'))
            //     ->schema($this->getupdateCarouselFormSchema()),
            // ->statePath('userData'),
            "updateCarouselForm" => $this->makeForm()->schema(
                $this->getUpdateCarouselFormSchema()
            ),
            // "createApiTokenForm" => $this->makeForm()->schema(
            //     $this->getCreateApiTokenFormSchema()
            // ),
            // "confirmTwoFactorForm" => $this->makeForm()->schema(
            //     $this->getConfirmTwoFactorFormSchema()
            // ),
        ]);
    }

    // protected function getupdateCarouselFormSchema(): array
    // {
    //     return [
    //         SpatieMediaLibraryFileUpload::make('carousel')
    //             ->label('عکس های کاروسل')
    //         // TextInput::make("name")
    //         //     ->label(__('filament-breezy::default.fields.name')),
    //         // TextInput::make($this->loginColumn)->unique(config('filament-breezy.user_model'), ignorable: $this->user)
    //         //     ->label(__('filament-breezy::default.fields.email')),
    //     ];
    // }

    // public function updateCarousel()
    // {
    //     dd($this->updateCarouselForm->getState(), $this->carousel);
    //     $this->user->update($this->updateCarouselForm->getState());
    //     $this->notify("success", __('filament-breezy::default.profile.personal_info.notify'));
    // }

    protected function getUpdateCarouselFormSchema(): array
    {
        return [
            // TextInput::make('name')->required(),
            // TextInput::make('alt')->required(),
            // FileUpload::make('path')
            Repeater::make('carousel')
                ->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('alt')->required(),
                    FileUpload::make('path')
                ])
                ->disableItemMovement()
                ->columns(2)
        ];
    }

    public function UpdateCarousel()
    {
        $state = $this->UpdateCarouselForm->getState();
        dd($state, $this->carousel);
        // Media::add($state['carousel'])->toMediaCollection('images');
        // $this->user->update([
        //     "password" => Hash::make($state["new_password"]),
        // ]);
        // session()->forget("password_hash_web");
        // Filament::auth()->login($this->user);
        $this->notify("success", __('filament-breezy::default.profile.password.notify'));
        $this->reset(["new_password", "new_password_confirmation"]);
    }

    // protected function getCreateApiTokenFormSchema(): array
    // {
    //     return [
    //         TextInput::make('token_name')->label(__('filament-breezy::default.fields.token_name'))->required(),
    //         CheckboxList::make('abilities')
    //             ->label(__('filament-breezy::default.fields.abilities'))
    //             ->options(config('filament-breezy.sanctum_permissions'))
    //             ->columns(2)
    //             ->required(),
    //     ];
    // }

    // public function createApiToken()
    // {
    //     $state = $this->createApiTokenForm->getState();
    //     $indexes = $state['abilities'];
    //     $abilities = config("filament-breezy.sanctum_permissions");
    //     $selected = collect($abilities)->filter(function ($item, $key) use (
    //         $indexes
    //     ) {
    //         return in_array($key, $indexes);
    //     })->toArray();
    //     $this->plain_text_token = Filament::auth()->user()->createToken($state['token_name'], array_values($selected))->plainTextToken;
    //     $this->notify("success", __('filament-breezy::default.profile.sanctum.create.notify'));
    //     $this->emit('tokenCreated');
    //     $this->reset(['token_name']);
    // }

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.banner';
}
