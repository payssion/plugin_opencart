<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionEsapaymy extends ControllerPaymentPayssion {
	protected $pm_id = 'esapay_my';
}