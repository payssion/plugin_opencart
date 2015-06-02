<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionPayEasyJP extends ControllerPaymentPayssion {
	protected $pm_id = 'payeasy_jp';
}