<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionItau extends ControllerPaymentPayssion {
	protected $pm_id = 'itau_br';
}