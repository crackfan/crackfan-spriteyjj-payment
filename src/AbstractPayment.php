<?php
/**
 * AbstractPayment.php
 *
 * 支付
 *
 * @package    SpriteYJJ\Payment
 * @author     Yaru Li <crackfan@qq.com> $
 * @version    RC
 * @created    2017-04-14 21:05:40Z [Yaru Li]$
 */

namespace SpriteYJJ\Payment;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class AbstractPayment implements IPayment
{
    /**
     * 支付配置信息
     * @var mixed $payment_config
     */
    protected $payment_config;

    /**
     * 支付请求信息（包含支付、异步通知、回调）
     * @var mix $request_info
     */
    protected $request_info;

    /**
     * 签名原始信息
     * @var mixed $sign_str
     */
    protected $sign_str;

    /**
     * 支付自动提交表单
     * @var string $submit_html
     */
    protected $submit_html;

    /**
     * 函数功能描述
     * @return string
     */
    protected $sign;

    /**
     * 日志对象
     * @var Logger
     */
    protected $logger;

    /**
     * 记录方法
     * @var string
     */
    protected $method;

    /**
     * 构造支付签名原始信息
     */
    protected function constructPaySignStr(){}

    /**
     * 构造支付异步通知签名原始信息
     */
    protected function constructNotifySignStr(){}

    /**
     * 构造支付回调签名原始信息
     */
    protected function constructReturnSignStr(){}

    /**
     * 生成验证签名
     */
    protected function generateSign(){}

    /**
     * 构造订单支付表单HTML
     */
    protected function constructSubmitHtml(){}


    public function __construct($payment_config)
    {
        $this->payment_config = $payment_config;
    }

    /**
     * 设定请求信息
     * @param mixed $req_info
     */
    public function setRequestInfo($req_info) {
        $this->request_info = $req_info;
    }

    /**
     * 获取签名
     * @return string
     */
    public function getSign() {
        return $this->sign;
    }

    /**
     * 提交支付
     */
    public function submit() {
        echo $this->submit_html;
    }

    /**
     * 用户写日志
     */
    function __destruct()
    {
        if(array_key_exists('logger', $this->payment_config) && $this->payment_config['logger']) {
            $this->logger = new Logger($this->payment_config['name'].'.'.$this->method);

            $logger = $this->payment_config['path'].$this->payment_config['name'].'.log';
            $this->logger->pushHandler(new StreamHandler($logger, Logger::INFO));

            $this->logger->info($this->sign_str,array());
            $this->logger->info($this->sign,array());
            $this->logger->info('',array());
        }
    }

}