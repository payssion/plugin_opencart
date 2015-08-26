<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionSingpost extends ControllerPaymentPayssion {
	protected $pm_id = 'molpay_sg_singpost';
}