<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionP24pl extends ControllerPaymentPayssion {
    protected $pm_id = 'p24_pl';
}