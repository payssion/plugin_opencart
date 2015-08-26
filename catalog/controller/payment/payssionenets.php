<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionENets extends ControllerPaymentPayssion {
	protected $pm_id = 'molpay_sg_enets';
}