<?php namespace NielsVanDenDries\AgeVerification;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function register()
    {
    }

    public function boot()
    {
    }

    public function registerComponents()
    {
        return [
            'Nielsvandendries\Ageverification\Components\PopupComponent' => 'popupComponent'
        ];
    }

    public function registerSettings()
    {
    }
}