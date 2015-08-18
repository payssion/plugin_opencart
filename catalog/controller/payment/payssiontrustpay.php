<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionTrustpay extends ControllerPaymentPayssion {
	protected $pm_id = 'trustpay';
}