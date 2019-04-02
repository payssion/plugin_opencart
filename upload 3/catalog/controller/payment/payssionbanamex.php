<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionBanamex extends ControllerPaymentPayssion {
	protected $pm_id = 'banamex_mx';
}