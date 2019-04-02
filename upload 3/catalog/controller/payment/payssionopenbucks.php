<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionOpenbucks extends ControllerPaymentPayssion {
	protected $pm_id = 'openbucks';
}