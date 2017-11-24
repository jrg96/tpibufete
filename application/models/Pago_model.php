<?php
class Pago_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_pago($id_caso, $monto, $nombre_servicio, $descripcion_pago)
    {
		$datos = array(
			'id_caso' => $id_caso,
			'nombre_servicio' => $nombre_servicio,
			'estado_pago' => 'no pagado',
			'descripcion_pago' => $descripcion_pago,
			'monto' => $monto
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_pago', $datos);
		$id = $this->db->insert_id();
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        return $id;
    }
	
	public function obtener_pago_porcaso($id_caso)
	{
		$this->db->select('*');
        $this->db->from('tbl_pago');
		$this->db->where('id_caso', $id_caso);
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function pendiente_de_pagos($id_caso)
	{
		$condicion = array(
			'id_caso' => $id_caso,
			'estado_pago' => 'no pagado'
		);
		
		$this->db->select('*');
        $this->db->from('tbl_pago');
		$this->db->where($condicion);
		$query = $this->db->get()->result_array();
		
		if (count($query) > 0)
		{
			return true;
		}
		return false;
	}
	
	public function efectuar_pago($id_pago, $payment_id, $token, $payer_id)
	{
		$datos = array(
			'estado_pago' => 'pagado',
			'payment_id' => $payment_id,
			'token' => $token,
			'payer_id' => $payer_id
		);
		
		$condicion = array(
			'id_pago' => $id_pago
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_pago', $datos);
        $err = $this->db->error();
        $this->db->db_debug = TRUE;
		
		// Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
	}
}