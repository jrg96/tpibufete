<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Administrador ////////////////////
class EspacioAdministrador extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Caso_model');
        $this->load->library('session');
    }
    
    public function index()
    {
		//'''''''''''''''''''''''''Seguridad Aplicacion ''''''''''''''''''''''''''
		/////////////////////////// Redireccion seguridad ////////////////////////
		if (!$this->session->userdata('id_usuario'))
		{
			redirect('/login/index');
		}
		
		/////////////////////////// Redireccion por tipo de usuario //////////////
		if ($this->session->userdata('tipo_usuario') == 'user')
		{
			redirect('/espaciousuario/index');
		}
		
		/////////////////////////// Redireccion por tipo de usuario //////////////
		if ($this->session->userdata('tipo_usuario') == 'emp')
		{
			redirect('/espacioempleado/index/Abierto');
		}
		//''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
		
		
		
		
		/////////////////////////// Mensajes de la aplicacion ////////////////////
		$resultado_operacion = 'ninguna';
        $mensaje_operacion = 'm';
        
        if ($this->session->userdata('resultado_operacion'))
        {
            $resultado_operacion = $this->session->userdata('resultado_operacion');
            $mensaje_operacion = $this->session->userdata('mensaje_operacion');
            
            $this->session->unset_userdata('resultado_operacion');
            $this->session->unset_userdata('mensaje_operacion');
        }
		
		/////////////////////////// Variables a utilizar /////////////////////////
		$id_usuario = $this->session->userdata('id_usuario');
		
		
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion,
			'id_usuario' => $this->session->userdata('id_usuario'),
			'nombre_usuario' => $this->session->userdata('nombre_usuario'),
			'tipo_usuario' => $this->session->userdata('id_usuario')
        ));
        $this->smarty->view('espacio_administrador.php');
    }
}
