<?php

namespace Samerior\MobileMoney;

use Samerior\MobileMoney\Equity\EquityServiceProvider;
use Samerior\MobileMoney\Mpesa\MpesaServiceProvider;
use Illuminate\Support\ServiceProvider;

class MobileMoneyServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(MpesaServiceProvider::class);    /** 将MpesaServiceProvider注册到应用程序 **/
        $this->app->register(EquityServiceProvider::class);    /** 将EquityServiceProvider注册到应用程序 **/
    }

    public function boot()
    {
        $this->requireHelperScripts();
    }

    private function requireHelperScripts()
    {
        $files = glob(__DIR__ . '/Support/*.php');
        foreach ($files as $file) {
            include_once $file;
        }
    }
}
