<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Administrador ////////////////////
class EditarCasoAdmin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Caso_model');
		$this->load->model('Pago_model');
		$this->load->model('Usuario_model');
        $this->load->library('session');
    }
    
    public function index($id_caso)
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
		
		/////////////////////////// Obtener datos de la DB ///////////////////////
		$caso = $this->Caso_model->obtener_datos_caso($id_caso);
		$pagos = $this->Pago_model->obtener_pago_porcaso($id_caso);
		$empleados = $this->Usuario_model->obtener_lista_abogado();
		
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion,
			'id_usuario' => $this->session->userdata('id_usuario'),
			'nombre_usuario' => $this->session->userdata('nombre_usuario'),
			'caso' => $caso,
			'pagos' => $pagos,
			'abogados' => $empleados
        ));
        $this->smarty->view('editar_caso_admin.php');
    }
	
	public function procesarestado()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		
		/////////////////////////// Captura de datos /////////////////////////////
		/////////////////////////// TRUE = Proteccion XSS ////////////////////////
		$estado_caso = $this->input->post('estado_caso', TRUE);
		$id_caso = $this->input->post('id_caso', TRUE);
		$atendido_por = $this->input->post('atendido_por', TRUE);
		$nombre_caso = $this->input->post('nombre_caso', TRUE);
		
		/////////////////////////// Validacion de datos //////////////////////////
		if (empty($estado_caso))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','No puede haber datose en blanco');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Caso_model->modificar_datos_caso($id_caso, $estado_caso, $atendido_por, $nombre_caso);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La edicion ha sido realizada con exito');
		}
		
		redirect('/editarcasoadmin/index/' . $id_caso);
	}
	
	public function procesarpago()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		
		/////////////////////////// Captura de datos /////////////////////////////
		/////////////////////////// TRUE = Proteccion XSS ////////////////////////
		$id_caso = $this->input->post('id_caso', TRUE);
		$monto = $this->input->post('monto', TRUE);
		$nombre_servicio = $this->input->post('item_cargado', TRUE);
		$descripcion_pago = $this->input->post('razon_pago', TRUE);
		
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Pago_model->insertar_pago($id_caso, $monto, $nombre_servicio, $descripcion_pago);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','El pago ha sido creado con exito');
		}
		
		redirect('/editarcasoadmin/index/' . $id_caso);
	}
}
