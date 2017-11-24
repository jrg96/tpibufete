<?php
class ChatGeneral_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_chat_general($id_usuario)
    {
		$datos = array(
			'id_usuario' => $id_usuario,
			'estado' => 'leido'
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_chat_general', $datos);
		$id = $this->db->insert_id();
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        return $id;
    }
	
	public function obtener_datos_chat_general($id_usuario)
	{
		$this->db->select('*');
        $this->db->from('tbl_chat_general');
		$this->db->where('id_usuario', $id_usuario);
		$query = $this->db->get()->result_array();
		
		return $query[0];
	}
	
	public function obtener_chat_general_nuevo()
	{
		$this->db->select('*');
        $this->db->from('tbl_chat_general');
		$this->db->where('estado', 'nuevo');
		$this->db->join('tbl_usuario', 'tbl_chat_general.id_usuario = tbl_usuario.id_usuario');
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function modificar_datos_chat_general($id_chat_general, $estado)
	{
		$datos = array(
			'estado' => $estado
		);
		
		$condicion = array(
			'id_chat_general' => $id_chat_general
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_chat_general', $datos);
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