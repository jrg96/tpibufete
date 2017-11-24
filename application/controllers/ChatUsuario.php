<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Empleado ////////////////////////
class ChatUsuario extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('ChatGeneral_model');
		$this->load->model('MensajeGeneral_model');
        $this->load->library('session');
    }
    
    public function index($id_chat_general)
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
		$mensajes = $this->MensajeGeneral_model->obtener_mensaje_general($id_chat_general);
		
		
		////////////////////////// Desplegar informacion ////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion,
			'id_usuario' => $this->session->userdata('id_usuario'),
			'nombre_usuario' => $this->session->userdata('nombre_usuario'),
			'mensajes' => $mensajes,
			'id_chat_general' => $id_chat_general
        ));
        $this->smarty->view('chat_general_usuario.php');
    }
	
	public function procesarmensaje()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		$id_usuario = $this->session->userdata('id_usuario');
		
		/////////////////////////// Captura de datos /////////////////////////////
		/////////////////////////// TRUE = Proteccion XSS ////////////////////////
		$texto_mensaje = $this->input->post('texto_mensaje', TRUE);
		$id_chat_general = $this->input->post('id_chat_general', TRUE);
		
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->MensajeGeneral_model->insertar_mensaje_general($id_usuario, $id_chat_general, $texto_mensaje);
			$this->ChatGeneral_model->modificar_datos_chat_general($id_chat_general, 'leido');
			
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','Mensaje enviado con exito');
		}
		
		redirect('/chatusuario/index/' . $id_chat_general);
	}
}
