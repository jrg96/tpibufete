<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Admin ////////////////////////
class EliminarCaso extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Caso_model');
        $this->load->library('session');
    }
    
	public function index($id_caso)
	{
		/////////////////////////// Redireccion por tipo de usuario //////////////
		if (!$this->session->userdata('tipo_usuario') == 'admin')
		{
			redirect('/inicio/index');
		}
		
		$this->Caso_model->eliminar_caso($id_caso);
		
		$this->session->set_userdata('resultado_operacion','exito');
		$this->session->set_userdata('mensaje_operacion','Caso eliminado con exito');
		
		redirect('/listacasos/index');
	}
}
