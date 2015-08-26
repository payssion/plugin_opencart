<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionDragonpay extends ControllerPaymentPayssion {
	protected $pm_id = 'molpay_ph_dragonpay';
}