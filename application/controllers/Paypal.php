<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
         
        // Load paypal library 
        $this->load->library('paypal_lib');
         
        // Load product model 
        $this->load->model('Order_model'); 
         
        // Load payment model 
        $this->load->model('Payment');
     } 
      
    function success(){ 

        // Get the transaction data 
        $paypalInfo = $this->input->post();
         
        $productData = $paymentData = array(); 
        if(!empty($paypalInfo['txn_id']) && !empty($paypalInfo['mc_gross']) && !empty($paypalInfo['mc_currency']) && !empty($paypalInfo['payment_status'])){ 

            // $payer_id               = $paypalInfo['payer_id'];
            $item_name              = $paypalInfo['item_name']; 
            $item_number            = $paypalInfo['item_number'];
            $txn_id                 = $paypalInfo["txn_id"]; 
            $payment_amt            = $paypalInfo["mc_gross"]; 
            $currency_code          = $paypalInfo["mc_currency"]; 
            $status                 = $paypalInfo["payment_status"];
            $payment_date           = $paypalInfo["payment_date"];
            $payer_name             = $paypalInfo["address_name"];
            $payer_email            = $paypalInfo["payer_email"];
            
            $data = array(
                'txn_id' => $txn_id,
                'payer_name' => $payer_name,
                'payer_email' => $payer_email,
                // 'payer_id' => $payer_id,
                'payment_date' => $payment_date,
                'status' => 'PAYMENT RECEIVED',
            );
            
            // get order by order_number
            $order = $this->Order_model->getOrderbyOrderNumber($item_name);
            
            // Get the payment ID
            $payment = $this->Payment->getPaymentbyPaymentID($item_number);

            // Verified order and payment got or not, if yes run

            if (!empty($payment) && !empty($order)) { //Validation
                // update order status
                $this->Order_model->updateOrder($order[0]['id'], ['order_status' => 'PAYMENT RECEIVED']);
    
                // Update payment status like order Status
                $this->Payment->updatePayment($payment[0]['id'],$data);
                $payment = $this->Payment->getPaymentbyPaymentID($item_number);
                $orderDetails = $this->Order_model->getDetailsbyOrderID($order[0]['id']);

                $data['product'] = $orderDetails; 
                $data['payment'] = $payment;
                $data['order'] = $order;
            }
            // $paypalInfo['verify_sign']
        }

        $this->load->view('layout/loading');
        $this->load->view('paypal/success', $data); 
        // Pass the transaction data to view 
    } 
      
    function cancel(){ 
        // Load payment failed view 
        $this->load->view('layout/loading');
        $this->load->view('paypal/cancel'); 
    } 
      
    function ipn(){ 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post(); 
         
        if(!empty($paypalInfo)){ 
            // Validate and get the ipn response 
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo); 
 
            // Check whether the transaction is valid 
            if($ipnCheck){ 
                // Check whether the transaction data is exists 
                $prevPayment = $this->payment->getPayment(array('txn_id' => $paypalInfo["txn_id"])); 
                if(!$prevPayment){ 
                    // Insert the transaction data in the database 
                    $data['user_id']        = $paypalInfo["custom"]; 
                    $data['product_id']     = $paypalInfo["item_number"]; 
                    $data['txn_id']         = $paypalInfo["txn_id"]; 
                    $data['payment_gross']  = $paypalInfo["mc_gross"]; 
                    $data['currency_code']  = $paypalInfo["mc_currency"]; 
                    $data['payer_name']     = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    $data['payer_email']    = $paypalInfo["payer_email"]; 
                    $data['status']         = $paypalInfo["payment_status"]; 
     
                    $this->payment->insertTransaction($data); 
                } 
            } 
        } 
    } 

    public function rateChecking() {
        $domain = "https://demo.connect.easyparcel.my/?ac=";

        $action = "EPRateCheckingBulk";
        $postparam = array(
            'api'	=> 'EP-O5VVKw6nO',
            'bulk'	=> array(
                array(
                    'pick_code'	=> '10050',
                    'pick_state'	=> 'png',
                    'pick_country'	=> 'MY',
                    'send_code'	=> '11950',
                    'send_state'	=> 'png',
                    'send_country'	=> 'MY',
                    'weight'	=> '5',
                    'width'	=> '0',
                    'length'	=> '0',
                    'height'	=> '0',
                    'date_coll'	=> '2023-04-20',
                ),
                array(
                    'pick_code'	=> '14300',
                    'pick_state'	=> 'png',
                    'pick_country'	=> 'MY',
                    'send_code'	=> '81100',
                    'send_state'	=> 'jhr',
                    'send_country'	=> 'MY',
                    'weight'	=> '10',
                    'width'	=> '0',
                    'length'	=> '0',
                    'height'	=> '0',
                    'date_coll'	=> '2023-04-20',
                ),
            ),
            'exclude_fields'	=> array(
                'rates.*.pickup_point',
            )
        );

        $url = $domain.$action;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postparam));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        ob_start(); 
        $return = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);

        $json = json_decode($return);
        echo "<pre>"; print_r($json); echo "</pre>";
    }

    public function createShipping() {
        $domain = "https://demo.connect.easyparcel.my/?ac=";
        
        $action = "EPSubmitOrderBulk";
        $postparam = array(
            'api'	=> 'EP-O5VVKw6nO',
            'bulk'	=> array(array(
                'weight'	=> '1',
                'width'	=> '1',
                'length'	=> '1',
                'height'	=> '1',
                'content'	=> 'book',
                'value'	=> '10',
                'service_id'	=> 'EP-CS0W',
                'pick_point'	=> '',
                'pick_name'	=> 'Yong Tat',
                'pick_company'	=> 'Yong Tat Sdn Bhd',
                'pick_contact'	=> '0123456789',
                'pick_mobile'	=> '0123456789',
                'pick_addr1'	=> 'ppppp46/7 adfa',
                'pick_addr2'	=> 'test',
                'pick_addr3'	=> '',
                'pick_addr4'	=> '',
                'pick_city'	=> 'city',
                'pick_state'	=> 'png',
                'pick_code'	=> '11950',
                'pick_country'	=> 'MY',
                'send_point'	=> '',
                'send_name'	=> 'sam',
                'send_company'	=> '',
                'send_contact'	=> '0122134567',
                'send_mobile'	=> '0122134567',
                'send_addr1'	=> 'ssssadsasdst test',
                'send_addr2'	=> 'test test',
                'send_addr3'	=> '',
                'send_addr4'	=> '',
                'send_city'	=> 'send city',
                'send_state'	=> 'png','send_code'	=> '11950',
                'send_country'	=> 'MY',
                'collect_date'	=> '2023-04-20',
                'sms'	=> '0',
                'send_email'	=> 'xxxxxx@hotmail.com',
                'hs_code'	=> 'yshs_code',
                'REQ_ID'	=> 'shipping # 1',
                'reference'	=> 'order12321',
                'cod_enabled'	=> true, 
                'cod_amount'	=> '10.00',) 
            ,)
        ,);
        
        $url = $domain.$action;
        echo $url.'<br/>';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postparam));
        curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        echo json_encode($postparam).'<br/>';
        
        ob_start(); 
        $return = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);
        
        // echo $return;exit;
        $json = json_decode($return);
        echo "<pre>"; print_r($json); echo "</pre>";
    }

    public function a() {
        $url = "https://demo.connect.easyparcel.my/?ac=EPRateCheckingBulk";
        $data = array(
            'api'	=> 'EP-O5VVKw6nO',
            'bulk'	=> array(
                array(
                    'pick_code'	=> '53300',
                    'pick_state'	=> 'png',
                    'pick_country'	=> 'MY',
                    'send_code'	=> '47301',
                    'send_state'	=> 'png',
                    'send_country'	=> 'MY',
                    'weight'	=> '5',
                    'width'	=> '1',
                    'length'	=> '1',
                    'height'	=> '1',
                    'date_coll'	=> '2023-04-28',
                ),
            
            ),
            'exclude_fields'	=> array(
                'rates.*.pickup_point',
            )
            );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

        $response = curl_exec($ch);

        if ($response === false) {
            echo "Error: " . curl_error($ch);
        } else {
            echo $response;
        }

        curl_close($ch);
    }

    public function b() {
        $url = "https://demo.connect.easyparcel.my/?ac=EPSubmitOrderBulk";
        $data = array(
            'api' => 'EP-O5VVKw6nO',
            'bulk' => array(
                array(
                    'weight' => '1',
                    'width' => '1',
                    'length' => '1',
                    'height' => '1',
                    'content' => 'book',
                    'value' => '10',
                    'service_id' => 'EP-CS08O',
                    'pick_point' => '',
                    'pick_name' => 'Yong Tat',
                    'pick_company' => 'Yong Tat Sdn Bhd',
                    'pick_contact' => '0123456789',
                    'pick_mobile' => '0123456789',
                    'pick_addr1' => 'ppppp46/7 adfa',
                    'pick_addr2' => 'test',
                    'pick_addr3' => '',
                    'pick_addr4' => '',
                    'pick_city' => 'city',
                    'pick_state' => 'png',
                    'pick_code' => '47301',
                    'pick_country' => 'MY',
                    'send_point' => '',
                    'send_name' => 'sam',
                    'send_company' => '',
                    'send_contact' => '0122134567',
                    'send_mobile' => '0122134567',
                    'send_addr1' => 'ssssadsasdst test',
                    'send_addr2' => 'test test',
                    'send_addr3' => '',
                    'send_addr4' => '',
                    'send_city' => 'send city',
                    'send_state' => 'png',
                    'send_code' => '53300',
                    'send_country' => 'MY',
                    'collect_date' => '2023-04-15',
                    'sms' => '0',
                    'send_email' => 'xxxxxx@hotmail.com',
                    'hs_code' => 'yshs_code',
                    'REQ_ID' => 'shipping # 1',
                    'reference' => 'order12321',
                    'cod_enabled' => true,
                    'cod_amount' => '10.00'
                )
            )
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

        $response = curl_exec($ch);

        if ($response === false) {
            echo "Error: " . curl_error($ch);
        } else {
            echo $response;
        }

        curl_close($ch);
    }

    public function c() {
        $url = "https://demo.connect.easyparcel.my/?ac=EPPayOrderBulk";
        $data = array(
            'api'	=> 'EP-O5VVKw6nO',
            'bulk'	=> array(
                array(
                    'order_no'	=> 'EI-5KT4D',
                ),
            ),
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

        $response = curl_exec($ch);

        if ($response === false) {
            echo "Error: " . curl_error($ch);
        } else {
            echo $response;
        }

        curl_close($ch);
    }
}

?>