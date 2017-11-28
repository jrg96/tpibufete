<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Admin ////////////////////////
class EliminarPagoEmp extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Pago_model');
        $this->load->library('session');
    }
    
	public function index($id_pago)
	{
		/////////////////////////// Redireccion por tipo de usuario //////////////
		if (!$this->session->userdata('tipo_usuario') == 'emp')
		{
			redirect('/inicio/index');
		}
		
		$this->Pago_model->eliminar_pago($id_pago);
		
		$this->session->set_userdata('resultado_operacion','exito');
		$this->session->set_userdata('mensaje_operacion','Pago eliminado con exito');
		
		redirect('/espacioempleado/index/Abierto');
	}
}
