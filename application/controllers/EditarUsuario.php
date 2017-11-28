<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Administrador ////////////////////
class EditarUsuario extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Usuario_model');
        $this->load->library('session');
    }
    
    public function index($id_usuario)
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
		
		
		
		
		/////////////////////////// Obtener datos de la DB ////////////////////////
		$usuario = $this->Usuario_model->obtener_usuario_porid($id_usuario);
		
		/////////////////////////// Despliegue ////////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion,
			'usuario' => $usuario
        ));
        $this->smarty->view('editar_usuario.php');
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
		$tipo = $this->input->post('tipo_usuario', TRUE);
		$id_usuario = $this->input->post('id_usuario', TRUE);
		
		///////////////////////// Validacion ded datos //////////////////////////
		if (empty($nombre) || empty($id_usuario) || empty($tipo))
		{
			$valido = false;
			
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','Rellene los campos por favor');
		}
		
		///////////////////////// Ejecucion de consultas ////////////////////////
		if ($valido)
		{
			if (empty($pwd) || empty($repetir))
			{
				$this->Usuario_model->modificar_datos_usuario($id_usuario, $nombre, $tipo, '', false);
			}
			else
			{
				$this->Usuario_model->modificar_datos_usuario($id_usuario, $nombre, $tipo, '', $pwd);
			}
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La edición ha sido realizada con exito');
		}
		
		redirect('/editarusuario/index/' . $id_usuario);
	}
}
