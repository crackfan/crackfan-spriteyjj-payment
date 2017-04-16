<?php
/**
 * IPayment.php
 *
 * 支付接口文件
 *
 * @package    SpriteYJJ\Payment
 * @author     Yaru Li <crackfan@qq.com> $
 * @version    RC
 * @created    2017-04-14 21:36:47Z [Yaru Li]$
 */

namespace SpriteYJJ\Payment;

interface IPayment
{
    /**
     * 处理成功
     */
    CONST SUCCESS = 1;

    /**
     * 处理失败
     */
    CONST FAILED = -1;

    /**
     * 未处理
     */
    CONST UNPOCESSED = 0;

    /**
     * 设定请求信息
     * @param mixed $req_info
     */
    public function setRequestInfo($req_info);

    /**
     * 获取签名
     * @return string
     */
    public function getSign();

    /**
     * 提交支付
     */
    public function submit();
}