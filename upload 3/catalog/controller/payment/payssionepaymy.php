<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionEpaymy extends ControllerPaymentPayssion {
	protected $pm_id = 'epay_my';
}