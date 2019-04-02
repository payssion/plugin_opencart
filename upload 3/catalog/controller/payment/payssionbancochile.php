<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionBancochile extends ControllerPaymentPayssion {
	protected $pm_id = 'bancochile_cl';
}