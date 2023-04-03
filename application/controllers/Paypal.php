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

        $this->load->view('paypal/success', $data); 
        // Pass the transaction data to view 
    } 
      
    function cancel(){ 
        // Load payment failed view 
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
}

?>