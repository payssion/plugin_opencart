<?php
class ControllerPaymentPayssion extends Controller {
	protected $pm_id = '';
	public function index() {
		$data['button_confirm'] = $this->language->get('button_confirm');

		$this->load->model('checkout/order');

		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

		if (!$this->config->get('payssion_test')) {
			$data['action'] = 'https://www.payssion.com/payment/create.html';
		} else {
			$data['action'] = 'http://sandbox.payssion.com/payment/create.html';
		}

		$data['pm_id'] = $this->pm_id;
		$data['api_key'] = $this->config->get('payssion_apikey');
		$data['track_id'] = $order_info['order_id'];
		$data['amount'] = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false);
		$data['currency'] = $order_info['currency_code'];
		$data['description'] = $this->config->get('config_name') . ' - #' . $order_info['order_id'];
		$data['payer_name'] = $order_info['payment_firstname'] . ' ' . $order_info['payment_lastname'];

// 		if (!$order_info['payment_address_2']) {
// 			$data['address'] = $order_info['payment_address_1'] . ', ' . $order_info['payment_city'] . ', ' . $order_info['payment_zone'];
// 		} else {
// 			$data['address'] = $order_info['payment_address_1'] . ', ' . $order_info['payment_address_2'] . ', ' . $order_info['payment_city'] . ', ' . $order_info['payment_zone'];
// 		}

		//$data['postcode'] = $order_info['payment_postcode'];
		$data['country'] = $order_info['payment_iso_code_2'];
		//$data['telephone'] = $order_info['telephone'];
		$data['payer_email'] = $order_info['email'];
		
		$data['notify_url'] = $this->url->link('payment/payssion/notify');
		$data['success_url'] = $this->url->link('payment/payssion/callback');
		$data['redirect_url'] = $this->url->link('payment/payssion/callback');

		$data['api_sig'] = $this->generateSignature($data, $this->config->get('payssion_secretkey'));
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/payssion.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/payment/payssion.tpl', $data);
		} else {
			return $this->load->view('default/template/payment/payssion.tpl', $data);
		}
	}
	
	private function generateSignature(&$req, $secretKey) {
		$arr = array($req['api_key'], $req['pm_id'], $req['amount'], $req['currency'],
				$req['track_id'], '', $secretKey);
		$msg = implode('|', $arr);
		return md5($msg);
	}
	
	public function callback() {
		$this->load->language('payment/payssion');
	
		$data['title'] = sprintf($this->language->get('heading_title'), $this->config->get('config_name'));
	
		if (!$this->request->server['HTTPS']) {
			$data['base'] = $this->config->get('config_url');
		} else {
			$data['base'] = $this->config->get('config_ssl');
		}
	
		$data['language'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');
	
		$data['heading_title'] = sprintf($this->language->get('heading_title'), $this->config->get('config_name'));
	
		$data['text_response'] = $this->language->get('text_response');
		$data['text_success'] = $this->language->get('text_success');
		$data['text_success_wait'] = sprintf($this->language->get('text_success_wait'), $this->url->link('checkout/success'));
		$data['text_failure'] = $this->language->get('text_failure');
		$data['text_failure_wait'] = sprintf($this->language->get('text_failure_wait'), $this->url->link('checkout/checkout', '', 'SSL'));
	
		if (isset($this->request->post['state']) && $this->request->post['state'] == 'complete') {
			$message = '';
				
			if (isset($this->request->post['track_id'])) {
				$message .= 'track_id: ' . $this->request->post['track_id'] . "\n";
			}
				
			if (isset($this->request->post['pm_id'])) {
				$message .= 'pm_id: ' . $this->request->post['pm_id'] . "\n";
			}
		
			if (isset($this->request->post['state'])) {
				$message .= 'state: ' . $this->request->post['state'] . "\n";
			}
				
			if (isset($this->request->post['amount'])) {
				$message .= 'amount: ' . $this->request->post['amount'] . "\n";
			}
				
			if (isset($this->request->post['paid'])) {
				$message .= 'paid: ' . $this->request->post['paid'] . "\n";
			}
				
			if (isset($this->request->post['currency'])) {
				$message .= 'currency: ' . $this->request->post['currency'] . "\n";
			}
				
			if (isset($this->request->post['notify_sig'])) {
				$message .= 'notify_sig: ' . $this->request->post['notify_sig'] . "\n";
			}
				
			$this->load->model('checkout/order');
				
			$this->model_checkout_order->addOrderHistory($track_id, $this->config->get('payssion_order_status_id'), $message, false);
				
			$data['continue'] = $this->url->link('checkout/success');
				
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/payssion_success.tpl')) {
				$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/payment/payssion_success.tpl', $data));
			} else {
				$this->response->setOutput($this->load->view('default/template/payment/payssion_success.tpl', $data));
			}
		} else {
			$data['continue'] = $this->url->link('checkout/cart');
				
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/payssion_failure.tpl')) {
				$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/payment/payssion_failure.tpl', $data));
			} else {
				$this->response->setOutput($this->load->view('default/template/payment/payssion_failure.tpl', $data));
			}
		}
		
	}

	public function notify() {
		$track_id = $this->request->post['track_id'];
		$this->load->model('checkout/order');
		if ($this->isValidNotify()) {
			if (!$this->request->server['HTTPS']) {
				$data['base'] = $this->config->get('config_url');
			} else {
				$data['base'] = $this->config->get('config_ssl');
			}
			
			$state = $this->request->post['state'];
			$message = '';
				
			if (isset($this->request->post['track_id'])) {
				$message .= 'track_id: ' . $this->request->post['track_id'] . "\n";
			}
				
			if (isset($this->request->post['pm_id'])) {
				$message .= 'pm_id: ' . $this->request->post['pm_id'] . "\n";
			}
			
			if (isset($this->request->post['state'])) {
				$message .= 'state: ' . $this->request->post['state'] . "\n";
			}
				
			if (isset($this->request->post['amount'])) {
				$message .= 'amount: ' . $this->request->post['amount'] . "\n";
			}
				
			if (isset($this->request->post['paid'])) {
				$message .= 'paid: ' . $this->request->post['paid'] . "\n";
			}
				
			if (isset($this->request->post['currency'])) {
				$message .= 'currency: ' . $this->request->post['currency'] . "\n";
			}
				
			if (isset($this->request->post['notify_sig'])) {
				$message .= 'notify_sig: ' . $this->request->post['notify_sig'] . "\n";
			}
				
			
			$status_list = array(
					'completed' => $this->config->get('payssion_order_status_id'),
					'pending' => $this->config->get('payssion_pending_status_id'),
					'cancelled_by_user' => $this->config->get('payssion_canceled_status_id'),
					'cancelled' => $this->config->get('payssion_canceled_status_id'),
					'rejected_by_bank' => $this->config->get('payssion_canceled_status_id'),
					'failed' => $this->config->get('payssion_failed_status_id'),
					'error' => $this->config->get('payssion_failed_status_id')
			);
				
			$this->model_checkout_order->addOrderHistory($track_id, $status_list[$state], $message);
			$this->response->setOutput('success');
			
		} else {
			$this->model_checkout_order->addOrderHistory($track_id, $this->config->get('config_order_status_id'), $this->language->get('text_pw_mismatch'));
			$this->response->setOutput('verify failed');
		}

	}
	
	public function isValidNotify() {
		$apiKey = $this->config->get('payssion_apikey');;
		$secretKey = $this->config->get('payssion_secretkey');
	
		// Assign payment notification values to local variables
		$pm_id = $this->request->post['pm_id'];
		$amount = $this->request->post['amount'];
		$currency = $this->request->post['currency'];
		$track_id = $this->request->post['track_id'];
		$sub_track_id = $this->request->post['sub_track_id'];
		$state = $this->request->post['state'];
	
		$check_array = array(
				$apiKey,
				$pm_id,
				$amount,
				$currency,
				$track_id,
				$sub_track_id,
				$state,
				$secretKey
		);
		$check_msg = implode('|', $check_array);
		$check_sig = md5($check_msg);
		$notify_sig = $this->request->post['notify_sig'];
		return ($notify_sig == $check_sig);
	}
}