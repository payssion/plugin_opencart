<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionNganluong extends ControllerPaymentPayssion {
	protected $pm_id = 'molpay_vn_nganluong';
}