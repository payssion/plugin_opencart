<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionSOFORT extends ControllerPaymentPayssion {
	protected $pm_id = 'sofort';
}