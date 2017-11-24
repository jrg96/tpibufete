<?php
	// Paso 1: autocargar las librerias necesarias
    require_once(APPPATH . 'libraries/paypal/Psr/autoload.php');
	require_once(APPPATH . 'libraries/paypal/PayPal/autoload.php');
	
	// Librerias requeridas para y procesar pagos
	use PayPal\Api\Amount;
	use PayPal\Api\Details;
	use PayPal\Api\Item;
	use PayPal\Api\ItemList;
	use PayPal\Api\Payer;
	use PayPal\Api\Payment;
	use PayPal\Api\PaymentExecution;
	use PayPal\Api\RedirectUrls;
	use PayPal\Api\Transaction;
	
	class PayPal 
	{
		var $ci;
		var $client_id;
		var $client_secret;
		
		public function __construct()
		{
            $this->ci =& get_instance();
			
			// Obteniendo la configuracion de config.php
			$this->client_id = $this->ci->config->item('client_id', 'paypal');
			$this->client_secret = $this->ci->config->item('client_secret', 'paypal');
		}
		
		public function crear_pago($monto, $sku, $nombre_item, $descripcion_item, $url_exito, $url_fracaso)
		{
			// Pagando ocupando paypal
			$payer = new Payer();	
			$payer->setPaymentMethod('paypal');
			
			// Crear item de pago
			$item = new Item();
			$item->setName($nombre_item)
			     ->setCurrency('USD')
				 ->setQuantity(1)
				 ->setSku($sku)
				 ->setPrice($monto);
				 
		    $itemList = new ItemList();
			$itemList->setItems(array($item));
			
			// Definir total
			$amount = new Amount();
			$amount->setCurrency('USD')
			       ->setTotal($monto);
				   
	        // Creando transaccion 
			$transaction = new Transaction();
			$transaction->setAmount($amount)
			            ->setItemList($itemList)
						->setDescription($descripcion_item)
						->setInvoiceNumber(uniqid());
			
			// Redireccionar en exito o fracaso
			$redirectUrls = new RedirectUrls();
			$redirectUrls->setReturnUrl($url_exito)
			             ->setCancelUrl($url_fracaso);
						 
			// Crear pago final
			$payment = new Payment();
			$payment->setIntent('sale')
			        ->setPayer($payer)
					->setRedirectUrls($redirectUrls)
					->setTransactions(array($transaction));
					
			$apiContext = new \PayPal\Rest\ApiContext(
				new \PayPal\Auth\OAuthTokenCredential($this->client_id, $this->client_secret)
			);
			
			try
			{
				$payment->create($apiContext);
				return $payment;
			}
			catch(Exception $ex)
			{
				return null;
			}
		}
		
		public function ejecutar_pago($payment_id, $payer_id)
		{
			$apiContext = new \PayPal\Rest\ApiContext(
				new \PayPal\Auth\OAuthTokenCredential($this->client_id, $this->client_secret)
			);
			
			// Detectamos si hay error
			$error = false; 
			
			// Obtener el pago que se ha realizado
			$pago = Payment::get($payment_id, $apiContext);
			
			// Ejecutar (terminar el pago)
			$execution = new PaymentExecution();
			$execution->setPayerId($payer_id);
			
			try
			{
				$result = $pago->execute($execution, $apiContext);
				try
				{
					$pago = Payment::get($payment_id, $apiContext);
				}
				catch(Exception $e)
				{
					$error = false;
				}
			}
			catch (Exception $e)
			{
				$error = true;
			}
			
			if ($error)
			{
				return null;
			}
			return $pago;
		}
	}
	
	