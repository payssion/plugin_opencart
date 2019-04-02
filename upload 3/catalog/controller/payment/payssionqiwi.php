<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionQIWI extends ControllerPaymentPayssion {
	protected $pm_id = 'qiwi';
}