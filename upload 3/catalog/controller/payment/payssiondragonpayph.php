<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionDragonpayph extends ControllerPaymentPayssion {
	protected $pm_id = 'dragonpay_ph';
}