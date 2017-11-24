<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProcesarPago extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Pago_model');
        $this->load->library('session');
    }
    
    public function index($estado)
    {
		// Paso 1: verificamos si la operacion fue un exito
		$exito = strpos($_SERVER['REQUEST_URI'], 'exito') !== false;
		
		if ($exito)
		{
			// Paso 2: obtenemos lo datos del id de pago y pagador
			$payment_id = $_GET['paymentId'];
			$payer_id = $_GET['PayerID'];
			$token = $_GET['token'];
			
			// Paso 3: ocupamos la API de paypal para ejecutar pago
			$pago = $this->paypal->ejecutar_pago($payment_id, $payer_id);
			
			// Paso 4: extraemos el sku y el estado para terminar de corroborar
			$estado = $pago->state;
			$id_pago = $pago->transactions[0]->item_list->items[0]->sku;
			
			// Paso 5: extraer id de pago y terminar de corroborar
			$id_pago = explode('_', $id_pago)[1];
			
			if ($estado == 'approved')
			{
				$this->Pago_model->efectuar_pago($id_pago, $payment_id, $token, $payer_id);
				echo var_dump("Transaccion aprovada y lista para poner en la DB");
			}
		}
    }
}
