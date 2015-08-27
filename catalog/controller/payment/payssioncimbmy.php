<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionCIMBmy extends ControllerPaymentPayssion {
	protected $pm_id = 'cimb_my';
}