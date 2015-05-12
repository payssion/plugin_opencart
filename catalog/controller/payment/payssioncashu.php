<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionCashu extends ControllerPaymentPayssion {
	protected $pm_id = 'cashu';
}