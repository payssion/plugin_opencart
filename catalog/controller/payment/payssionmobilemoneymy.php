<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionMobilemoneymy extends ControllerPaymentPayssion {
	protected $pm_id = 'mobilemoney_my';
}