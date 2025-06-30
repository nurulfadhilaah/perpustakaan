<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->profile()
            ->path('admin')
            ->login()
            ->authGuard('admin')

            // 🌈 Branding
            ->brandName('Sistem Admin Perpustakaan Madina')
            ->brandLogo(new \Illuminate\Support\HtmlString(
                    '<div class="flex items-center gap-3">
                        <img src="' . asset('images/logomadina2.png') . '" alt="Logo Madina" class="h-10 w-10 rounded-full shadow-md">
                        <div class="text-left leading-tight hidden sm:block">
                            <span class="block text-base font-semibold text-gray-900">Perpustakaan Madina</span>
                            <span class="block text-xs text-gray-500">Sistem Administrator</span>
                        </div>
                    </div>'
                ))
            ->favicon(asset('images/madinafavicon.png')) // Pastikan file favicon sudah ada di public/images

        
            ->colors([
                'primary' => Color::Hex('#14532d'), 
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
