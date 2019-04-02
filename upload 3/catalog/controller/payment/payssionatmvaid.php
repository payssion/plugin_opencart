<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionATMVAid extends ControllerPaymentPayssion {
	protected $pm_id = 'atmva_id';
}