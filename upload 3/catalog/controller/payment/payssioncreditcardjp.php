<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionCreditCardJP extends ControllerPaymentPayssion {
	protected $pm_id = 'creditcard_jp';
}