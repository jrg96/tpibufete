<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Usuario_model');
		$this->load->model('ChatGeneral_model');
        $this->load->library('session');
    }
    
    public function index()
    {
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
		
		
		
		/////////////////////////// Despliegue ////////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion
        ));
        $this->smarty->view('registro.php');
    }
	
	public function procesar()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		
		/////////////////////////// Captura datos ////////////////////////////////
		/////////////////////////// TRUE = Proteccion XSS ////////////////////////
		$email = $this->input->post('txtEmail', TRUE);
		$nombre = $this->input->post('txtNombre', TRUE);
		$pwd = $this->input->post('txtContrasenia', TRUE);
		$repetir = $this->input->post('txtRepetir', TRUE);
		
		////////////////////////// Validacion de datos ///////////////////////////
		if (($pwd == $repetir) && !$this->Usuario_model->usuario_ya_existe($email))
		{
			$valido = true;
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La creacion ha sido realizada con exito');
		}
		else
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','Ambas contraseñas no cocinciden o usuario ya existe');
		}
		
		///////////////////////// Ejecucion de consultas ////////////////////////
		if ($valido)
		{
			$this->Usuario_model->insertar_usuario($email, $pwd, $nombre, 'user');
			$usuario = $this->Usuario_model->obtener_usuario($email);
			$this->ChatGeneral_model->insertar_chat_general($usuario['id_usuario']);
		}
		
		redirect('/registro/index');
	}
}
