<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionMaybank2umy extends ControllerPaymentPayssion {
	protected $pm_id = 'maybank2u_my';
}