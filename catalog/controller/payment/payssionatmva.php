<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionATMVA extends ControllerPaymentPayssion {
	protected $pm_id = 'molpay_id_atmva';
}