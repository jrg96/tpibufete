<?php
class Caso_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_caso($id_usuario, $nombre_caso)
    {
		$datos = array(
			'id_usuario' => $id_usuario,
			'nombre_caso' => $nombre_caso,
			'estado' => 'Pendiente'
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_caso', $datos);
		$id = $this->db->insert_id();
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        return $id;
    }
	
	public function obtener_caso_porusuario($id_usuario)
	{
		$this->db->select('*');
        $this->db->from('tbl_caso');
		$this->db->join('tbl_usuario', 'tbl_caso.atendido_por = tbl_usuario.id_usuario', 'left');
		$this->db->where('tbl_caso.id_usuario', $id_usuario);
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function obtener_caso_porempleado($id_usuario, $estado)
	{
		$condicion = array(
			'tbl_caso.atendido_por' => $id_usuario,
			'tbl_caso.estado' => $estado
		);
		
		$this->db->select('*');
        $this->db->from('tbl_caso');
		$this->db->join('tbl_usuario', 'tbl_caso.atendido_por = tbl_usuario.id_usuario', 'left');
		$this->db->where($condicion);
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function obtener_caso_porestado($estado)
	{
		$this->db->select('*');
        $this->db->from('tbl_caso');
		$this->db->join('tbl_usuario', 'tbl_caso.id_usuario = tbl_usuario.id_usuario', 'left');
		$this->db->where('tbl_caso.estado', $estado);
		
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function obtener_lista_casos()
	{
		$this->db->select('*');
        $this->db->from('tbl_caso');
		$this->db->join('tbl_usuario', 'tbl_caso.id_usuario = tbl_usuario.id_usuario', 'left');
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function obtener_datos_caso($id_caso)
	{
		$this->db->select('*');
        $this->db->from('tbl_caso');
		$this->db->where('id_caso', $id_caso);
		$query = $this->db->get()->result_array();
		
		return $query[0];
	}
	
	public function modificar_datos_caso($id_caso, $estado, $atendido_por, $nombre_caso)
	{
		$datos = array(
			'nombre_caso' => $nombre_caso,
			'estado' => $estado,
			'atendido_por' => $atendido_por
		);
		
		$condicion = array(
			'id_caso' => $id_caso
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_caso', $datos);
        $err = $this->db->error();
        $this->db->db_debug = TRUE;
		
		// Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
	}
	
	public function eliminar_caso($id_caso)
	{
		$this->db->delete('tbl_caso', array('id_caso' => $id_caso));
	}
}