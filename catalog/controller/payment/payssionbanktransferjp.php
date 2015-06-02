<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionBankTransferJP extends ControllerPaymentPayssion {
	protected $pm_id = 'banktransfer_jp';
}