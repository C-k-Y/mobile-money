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
        $files = glob(__DIR__ . '/Support/*.php');    /** 获取当前路径下的所有.php文件 **/
        foreach ($files as $file) {
            /** include_once 是 PHP 的一个函数，用于将指定文件包含进当前脚本执行。
            include_once $file 将根据变量 $file 的值，将每个文件路径进行包含 **/
            include_once $file;           
        }
    }
}
