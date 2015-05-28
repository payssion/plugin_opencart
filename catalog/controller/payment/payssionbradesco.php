<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionBradesco extends ControllerPaymentPayssion {
	protected $pm_id = 'bradesco_br';
}