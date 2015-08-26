<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionMaybank2u extends ControllerPaymentPayssion {
	protected $pm_id = 'molpay_my_maybank2u';
}