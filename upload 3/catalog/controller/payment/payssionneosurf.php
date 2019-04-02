<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionNeosurf extends ControllerPaymentPayssion {
	protected $pm_id = 'neosurf';
}