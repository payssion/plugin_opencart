<?php

require_once(realpath(dirname(__FILE__)) . "/payssion.php");
class ControllerPaymentPayssionMultibancopt extends ControllerPaymentPayssion {
    protected $pm_id = 'multibanco_pt';
}