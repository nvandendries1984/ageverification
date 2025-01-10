<?php namespace Nielsvandendries\Ageverification\Components;

use Cms\Classes\ComponentBase;
use NielsVanDenDries\AgeVerification\Models\IpModel;
use Illuminate\Support\Facades\Request;

class PopupComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Popup Component',
            'description' => 'Displays an age verification popup.'
        ];
    }

    public function defineProperties()
    {
        return [
            'minimumAge' => [
                'title'             => 'Minimum Age',
                'description'       => 'The minimum age required to access the site',
                'default'           => 18,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Minimum Age property can contain only numeric symbols'
            ]
        ];
    }

    public function onRun()
    {
        $ip = Request::ip();
        $this->page['ipAddress'] = $ip;
        $this->page['minimumAge'] = $this->property('minimumAge');

        if (!$this->checkIpVerified($ip)) {
            $this->page['showPopup'] = true;
            $this->addCss('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
            $this->addJs('https://code.jquery.com/jquery-3.5.1.slim.min.js');
            $this->addJs('https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js');
            $this->addJs('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js');
        } else {
            $this->page['showPopup'] = false;
        }
    }

    public function onVerifyAge()
    {
        $ip = Request::ip();
        $this->storeIp($ip);
        return redirect()->refresh();
    }

    protected function checkIpVerified($ip)
    {
        return IpModel::where('ip', $ip)->exists();
    }

    protected function storeIp($ip)
    {
        if (!IpModel::where('ip', $ip)->exists()) {
            $ipModel = new IpModel();
            $ipModel->ip = $ip;
            $ipModel->save();
        }
    }
}