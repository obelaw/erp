<?php

namespace Obelaw\ERP;

use Filament\Facades\Filament;
use Filament\Http\Middleware\Authenticate;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Obelaw\Catalog\Filament\ERPCatalogModule;
use Obelaw\Contacts\Filament\ERPContactModule;
use Obelaw\ERP\ERP;
use Obelaw\Permissions\Http\Middleware\PermissionMiddleware;
use Obelaw\Warehouse\Filament\ERPWarehouseModule;

class ERPPanelProvider extends PanelProvider
{
    private ERP $erp;

    public function erp(ERP $erp)
    {
        //
    }

    public function register(): void
    {
        $erp = ERP::make();

        $erp->setModules([
            new ERPWarehouseModule,
            new ERPCatalogModule,
            new ERPContactModule,
        ]);

        $this->erp($erp);

        $this->erp = $erp;

        Filament::registerPanel(
            fn (): Panel => $this->panel(Panel::make()),
        );
    }

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('erp-o')
            ->path($this->erp->getPath())
            ->colors([
                'primary' => '#fc4706',
            ])
            ->plugins($this->erp->getModules())
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                PermissionMiddleware::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->authGuard('obelaw');
    }
}
