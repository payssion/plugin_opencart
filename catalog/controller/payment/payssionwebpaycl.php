<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionWebpaycl extends ControllerPaymentPayssion {
	protected $pm_id = 'webpay_cl';
}