<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionSberbankru extends ControllerPaymentPayssion {
	protected $pm_id = 'sberbank_ru';
}