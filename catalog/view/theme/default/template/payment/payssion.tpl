<form action="<?php echo $action; ?>" method="post">
  <input type="hidden" name="api_key" value="<?php echo $api_key; ?>" />
  <input type="hidden" name="api_sig" value="<?php echo $api_sig; ?>" />
  <input type="hidden" name="pm_id" value="<?php echo $pm_id; ?>" />
  <input type="hidden" name="payer_name" value="<?php echo $payer_name; ?>" />
  <input type="hidden" name="payer_ref">
  <input type="hidden" name="payer_email"  value="<?php echo $payer_email; ?>" />
  <input type="hidden" name="track_id" value="<?php echo $track_id; ?>" />
  <input type="hidden" name="sub_track_id" />
  <input type="hidden" name="description" value="<?php echo $description; ?>" />
  <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
  <input type="hidden" name="currency" value="<?php echo $currency; ?>" />
  <input type="hidden" name="language" value="en">
  <input type="hidden" name="notify_url"  value="<?php echo $notify_url; ?>" >
  <input type="hidden" name="success_url" value="<?php echo $success_url; ?>" />
  <input type="hidden" name="redirect_url"  value="<?php echo $redirect_url; ?>" />

  <div class="buttons">
    <div class="pull-right">
      <input type="submit" value="<?php echo $button_confirm; ?>" class="btn btn-primary" />
    </div>
  </div>
</form>
