<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionEPSat extends ControllerPaymentPayssion {
    protected $pm_id = 'eps_at';
}