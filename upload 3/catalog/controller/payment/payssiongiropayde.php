<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionGiropayde extends ControllerPaymentPayssion {
	protected $pm_id = 'giropay_de';
}