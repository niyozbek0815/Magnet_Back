<?php

namespace App\Providers;

use App\Filament\Resources\AdminsResource;
use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function(){
            if(auth()->user())
            {
                if(auth()->user()->is_admin === 1 && auth()->user()->hasAnyRole(['superadmin', 'admin', 'contentMenager', 'devoloper']))
                {
                  Filament::registerUserMenuItems([
                      UserMenuItem::make()
                              ->label('Profile Edit')
                              ->url('/admin/admins/'. auth()->user()->id.'/edit')
                              ->icon('heroicon-s-users'),               
                  ]);
                }
            }
            
          });
    }
}
