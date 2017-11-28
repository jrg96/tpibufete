<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Admin ////////////////////////
class EliminarUsuario extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Usuario_model');
        $this->load->library('session');
    }
    
	public function index($id_usuario)
	{
		/////////////////////////// Redireccion por tipo de usuario //////////////
		if (!$this->session->userdata('tipo_usuario') == 'admin')
		{
			redirect('/inicio/index');
		}
		
		$this->Usuario_model->eliminar_usuario($id_usuario);
		
		$this->session->set_userdata('resultado_operacion','exito');
		$this->session->set_userdata('mensaje_operacion','Usuario eliminado con exito');
		
		redirect('/crearusuario/index');
	}
}
