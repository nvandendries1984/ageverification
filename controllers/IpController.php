<?php namespace NielsVanDenDries\AgeVerification\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;

class IpController extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'age_verification_manager' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('NielsVanDenDries.AgeVerification', 'main-menu-item-avmain');
    }

}
