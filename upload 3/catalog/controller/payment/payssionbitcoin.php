<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionBitcoin extends ControllerPaymentPayssion {
	protected $pm_id = 'bitcoin';
}