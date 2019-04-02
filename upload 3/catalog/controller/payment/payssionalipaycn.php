<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionAlipaycn extends ControllerPaymentPayssion {
	protected $pm_id = 'alipay_cn';
}