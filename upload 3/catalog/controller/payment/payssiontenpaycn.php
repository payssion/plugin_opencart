<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionTenpaycn extends ControllerPaymentPayssion {
	protected $pm_id = 'tenpay_cn';
}