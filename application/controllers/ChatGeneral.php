<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Usuario comun ////////////////////
class ChatGeneral_model extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('ChatGeneral_model');
		$this->load->model('MensajeGeneral_model');
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
		if ($this->session->userdata('tipo_usuario') == 'emp')
		{
			redirect('/espacioempleado/index/Abierto');
		}
		
		/////////////////////////// Redireccion por tipo de usuario //////////////
		if ($this->session->userdata('tipo_usuario') == 'admin')
		{
			redirect('/espacioadministrador/index');
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
		
		
		/////////////////////////// Obtener datos de la DB ///////////////////////
		$chat_general = $this->ChatGeneral_model->obtener_datos_chat_general($id_usuario);
		$mensajes = $this->MensajeGeneral_model->obtener_mensaje_general($chat_general['id_chat_general']);
		
		
		////////////////////////// Desplegar informacion ////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion,
			'id_usuario' => $this->session->userdata('id_usuario'),
			'nombre_usuario' => $this->session->userdata('nombre_usuario'),
			'mensajes' => $mensajes
        ));
        $this->smarty->view('chat_general.php');
    }
	
	public function procesarmensaje()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		$id_usuario = $this->session->userdata('id_usuario');
		
		
		/////////////////////////// Captura de datos /////////////////////////////
		/////////////////////////// TRUE = Proteccion XSS ////////////////////////
		$texto_mensaje = $this->input->post('texto_mensaje', TRUE);

		
		/////////////////////////// Obtener datos de la DB ///////////////////////
		$chat_general = $this->ChatGeneral_model->obtener_datos_chat_general($id_usuario);
		
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->MensajeGeneral_model->insertar_mensaje_general($id_usuario, $chat_general['id_chat_general'], $texto_mensaje);
			$this->ChatGeneral_model->modificar_datos_chat_general($chat_general['id_chat_general'], 'nuevo');
			
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','Mensaje enviado con exito');
		}
		
		redirect('/chatgeneral/index/');
	}
}
