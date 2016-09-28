<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionNetCashJP extends ControllerPaymentPayssion {
	protected $pm_id = 'netcash_jp';
}