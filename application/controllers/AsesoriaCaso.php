<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Usuario comun ////////////////////
class AsesoriaCaso extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Caso_model');
		$this->load->model('Mensaje_model');
		$this->load->model('Pago_model');
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
		
		
		
		
		/////////////////////////// Obtener datos de la DB ///////////////////////
		$mensajes = $this->Mensaje_model->obtener_mensaje_porcaso($id_caso);
		$caso = $this->Caso_model->obtener_datos_caso($id_caso);
		$pagos = $this->Pago_model->obtener_pago_porcaso($id_caso);
		$puede_ver_contenido = true;
		$pendiente_pagos = $this->Pago_model->pendiente_de_pagos($id_caso);
		
		if ($pendiente_pagos)
		{
			$puede_ver_contenido = false;
		}
		
		$arr_final_pagos = array();
		foreach ($pagos as $pago)
		{
			$arr_interno = array();
			$arr_interno['link'] = 'none';
			
			if ($pago['estado_pago'] == 'no pagado')
			{
				// Creando la data necesaria para validar pago
				$monto = $pago['monto'];
				$sku = 'idpago_' . $pago['id_pago'];
				$nombre_item = $pago['nombre_servicio'];
				$descripcion_item = $pago['descripcion_pago'];
				$url_exito = base_url() . 'index.php/procesarpago/index/exito';
				$url_fracaso = base_url() . 'index.php/procesarpago/index/fracaso';
				
				$pago_paypal = $this->paypal->crear_pago($monto, $sku, $nombre_item, $descripcion_item, $url_exito, $url_fracaso);
				$arr_interno['link'] = $pago_paypal->getApprovalLink();
			}
			
			$arr_interno['pago'] = $pago;
			array_push($arr_final_pagos, $arr_interno);
		}
		
		
		
		//////////////////////////// Desplegar informacion ////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion,
			'id_usuario' => $this->session->userdata('id_usuario'),
			'nombre_usuario' => $this->session->userdata('nombre_usuario'),
			'caso' => $caso,
			'mensajes' => $mensajes,
			'pagos' => $arr_final_pagos,
			'puede_ver_contenido' => $puede_ver_contenido
        ));
        $this->smarty->view('asesoria_caso.php');
    }
	
	public function procesarmensaje()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		
		/////////////////////////// Captura de datos /////////////////////////////
		/////////////////////////// TRUE = Proteccion XSS ////////////////////////
		$id_usuario = $this->session->userdata('id_usuario', TRUE);
		$id_caso = $this->input->post('id_caso', TRUE);
		$texto_mensaje = $this->input->post('texto_mensaje', TRUE);
		
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Mensaje_model->insertar_mensaje($id_usuario, $id_caso, $texto_mensaje);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','Mensaje enviado con exito');
		}
		
		redirect('/asesoriacaso/index/' . $id_caso);
	}
	
	public function procesararchivo()
	{
		/////////////////////////// Configuracion subida archivo  ////////////////
		$ruta = realpath(APPPATH . '../documentos_subidos');
		$config['upload_path']          = $ruta;
        $config['allowed_types']        = 'gif|jpg|png|docx|xls|pptx|doc|ppt|rar';
		$config['max_size']             = 512000;
		$config['encrypt_name']         = TRUE;
		$this->load->library('upload', $config);
		
		
		/////////////////////////// Captura de datos /////////////////////////////
		/////////////////////////// TRUE = Proteccion XSS ////////////////////////
		$id_usuario = $this->session->userdata('id_usuario', TRUE);
		$id_caso = $this->input->post('id_caso', TRUE);
		
		
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($this->upload->do_upload('archivo_a_subir'))
        {
			// extrayendo datos del archivo
            $data = $this->upload->data();
			$nombre_original = $data['orig_name'];
			$nombre_encriptado = $data['file_name'];
			
			$this->Mensaje_model->insertar_mensaje_archivo($id_usuario, $id_caso, $nombre_original, $nombre_encriptado);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','Mensaje enviado con exito');
			
			redirect('/asesoriacaso/index/' . $id_caso);
        }
		else
		{
			$this->session->set_userdata('resultado_operacion','fallo');
			$this->session->set_userdata('mensaje_operacion','No pudo subirse archivo, intentelo nuevamente');
			redirect('/asesoriacaso/index/' . $id_caso);
		}
	}
}
