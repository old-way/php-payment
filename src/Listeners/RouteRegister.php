<?php
/**
 * This file is part of Notadd.
 *
 * @author AllenGu <674397601@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-05-22 16:24
 */
namespace Notadd\Multipay\Listeners;

use Notadd\Multipay\Controllers\AlipayController;
use Notadd\Foundation\Routing\Abstracts\RouteRegister as AbstractRouteRegister;
use Notadd\Multipay\Controllers\UnionController;
use Notadd\Multipay\Controllers\WechatController;
use Notadd\Multipay\Controllers\UploadController;
use Notadd\Multipay\Controllers\PayController;
/**
 * Class RouteRegister.
 */
class RouteRegister extends AbstractRouteRegister
{
    /**
     * Handle Route Registrar.
     */
    public function handle()
    {
            $this->router->group(['middleware' => ['cross', 'web']], function () {
                $this->router->post('get',AlipayController::class . '@get');
                $this->router->post('set', AlipayController::class . '@set');
                $this->router->post('get',WechatController::class . '@get');
                $this->router->post('set',WechatController::class . '@set');
                $this->router->post('get',UnionController::class . '@get');
                $this->router->post('set',UnionController::class . '@set');
                $this->router->post('upload',UploadController::class .'@handle');
            });

            //http://pay.ibenchu.xyz:8080/pay?gate_way=wechat&way=Alipay_Express&money=100&sign=RSA2

        $this->router->group(['middleware' => ['cross', 'web'], 'prefix' => 'api/multipay'], function () {
            $this->router->get('pay', PayController::class. '@pay');
            $this->router->get('query', PayController::class. '@query');
            $this->router->get('refund', PayController::class. '@refund');
            $this->router->get('cancel', PayController::class. '@cancel');
            $this->router->get('webnotice', PayController::class. '@webNotice');
            $this->router->get('upload', UploadController::class. '@upload');
            $this->router->get('test',PayController::class. '@test');
        });
    }
}
