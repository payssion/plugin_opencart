<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionWebMoney extends ControllerPaymentPayssion {
	protected $pm_id = 'webmoney';
}