<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionAffinepgmy extends ControllerPaymentPayssion {
	protected $pm_id = 'affinepg_my';
}