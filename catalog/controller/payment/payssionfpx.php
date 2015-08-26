<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionFPX extends ControllerPaymentPayssion {
	protected $pm_id = 'molpay_my_fpx';
}