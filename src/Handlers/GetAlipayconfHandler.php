<?php
/**
 * Created by PhpStorm.
 * User: ibenchu-024
 * Date: 2017/5/24
 * Time: 11:54
 */

namespace Notadd\Multipay\Handlers;

use Illuminate\Container\Container;
use Notadd\Foundation\Passport\Abstracts\DataHandler;
use Notadd\Foundation\Setting\Contracts\SettingsRepository;

/**
 * Class GetAlipayconfHandler.
 */
class GetAlipayconfHandler extends DataHandler
{
    /**
     * @var \Notadd\Foundation\Setting\Contracts\SettingsRepository
     */
    protected $settings;

    /**
     * GetHandler constructor.
     *
     * @param Container $container
     * @param SettingsRepository $settings
     */
    public function __construct(Container $container, SettingsRepository $settings)
    {
        parent::__construct($container);
        $this->settings = $settings;
    }

    /**
     * Data for handler.
     *
     * @return array
     */
    public function data()
    {
        return [
            'alipay_enabled' => $this->settings->get('alipay.alipay_enabled', false),

            'sign_type' => $this->settings->get('alipay.sign_type'),

            'version' => $this->settings->get('alipay.version'),

            'app_id' => $this->settings->get('alipay.app_id'),

            'private_key' => $this->settings->get('alipay.private_key'),

            'public_key' => $this->settings->get('alipay.public_key'),

            'input_charset' => $this->settings->get('alipay.input_charset'),

            'alipay_key' => $this->settings->get('alipay.alipay_key')
        ];
    }

    public function execute()
    {
        dd(1);
        dd($this->request->input('name'));
        $data = $this->data();

//        $name = $this->request->input('name');


        return $this->withCode(200)->withData($name)->withMessage('获取信息成功');
    }
}
