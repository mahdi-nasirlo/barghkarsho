<?php

namespace App\Filament\Pages;

use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\Grid;
use Spatie\Sitemap\SitemapGenerator;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\ButtonAction;
use Filament\Forms\Components\FileUpload;
use io3x1\FilamentSitemap\Settings\SitesSettings;


class SiteSettings extends SettingsPage
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static string $settings = SitesSettings::class;

    protected static ?string $title = 'سایت مپ';

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationGroup = 'تنظیمات';

    protected static function getNavigationLabel(): string
    {
        return "سایت مپ";
    }

    protected function getActions(): array
    {
        return [
            ButtonAction::make('sitemap')->action('generateSitemap')->label("ساختن سایت مپ"),
        ];
    }


    public function generateSitemap()
    {
        // SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));

        session()->flash('notification', [
            'message' => __("Sitemap Generated Success"),
            'status' => "success",
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(['default' => 2])->schema([
                TextInput::make('site_name')->label("نام سایت")->columnSpan(["2xl" => 1])->hint('setting("site_name")'),
                TextInput::make('site_author')->label('نویسنده سایت')->columnSpan(["2xl" => 1])->hint('setting("site_author")'),
                TextInput::make('site_email')->label("ایمیل سایت")->columnSpan(["2xl" => 1])->hint('setting("site_email")'),
                TextInput::make('site_phone')->label("تلفن سایت")->columnSpan(["2xl" => 1])->hint('setting("site_phone")'),
                TextArea::make('site_description')->label("توضیخات سایت")->columnSpan(["2xl" => 1])->hint('setting("site_description")'),
                TextArea::make('site_keywords')->label("کلمات کلیدی سایت")->columnSpan(["2xl" => 1])->hint('setting("site_keywords")'),
                TextArea::make('site_address')->label("آدرس سایت ( موقعیت مکانی )")->columnSpan(["2xl" => 1])->hint('setting("site_address")'),
                TextInput::make('site_phone_code')->label("کد تلفن سایت")->columnSpan(["2xl" => 1])->hint('setting("site_phone_code")'),
                TextInput::make('site_location')->label("موقعیت سایت ( کشور )")->columnSpan(["2xl" => 2])->hint('setting("site_location")'),
                TextInput::make('site_currency')->label("ارز مورد استفاده سایت")->hint('setting("site_currency")'),
                TextInput::make('site_language')->label("زبان سایت")->hint('setting("site_language")'),
                FileUpload::make('site_profile')->label("عکس پروفایل سایت")->columnSpan(["2xl" => 2])->hint('setting("site_profile")'),
                FileUpload::make('site_logo')->label("لوگو سایت")->columnSpan(["2xl" => 2])->hint('setting("site_logo")'),
                Repeater::make('site_social')->label("شبکه های اجتماعی سایت")->columnSpan(["2xl" => 2])->schema([
                    TextInput::make('نام شبکه'),
                    TextInput::make('لینک')->url(),
                ])->hint('setting("site_social")'),
            ])

        ];
    }
}
