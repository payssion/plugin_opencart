<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionCherryCredits extends ControllerPaymentPayssion {
	protected $pm_id = 'cherrycredits';
}