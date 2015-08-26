<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionPaylink extends ControllerPaymentPayssion {
	protected $pm_id = 'molpay_my_paylink';
}