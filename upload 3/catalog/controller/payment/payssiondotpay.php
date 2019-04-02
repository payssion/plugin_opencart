<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionDotpay extends ControllerPaymentPayssion {
	protected $pm_id = 'dotpay_pl';
}