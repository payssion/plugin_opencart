<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionFPXmy extends ControllerPaymentPayssion {
	protected $pm_id = 'fpx_my';
}