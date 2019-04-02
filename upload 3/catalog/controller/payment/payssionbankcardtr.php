<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionBankcardtr extends ControllerPaymentPayssion {
	protected $pm_id = 'bankcard_tr';
}