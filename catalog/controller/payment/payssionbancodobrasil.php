<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionBancodobrasil extends ControllerPaymentPayssion {
	protected $pm_id = 'bancodobrasil_br';
}