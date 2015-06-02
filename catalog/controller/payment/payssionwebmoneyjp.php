<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionWebMoneyJP extends ControllerPaymentPayssion {
	protected $pm_id = 'webmoney_jp';
}