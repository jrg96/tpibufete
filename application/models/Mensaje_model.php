<?php
class Mensaje_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_mensaje($id_usuario, $id_caso, $texto_mensaje)
    {
		date_default_timezone_set("Europe/London");
		
		$objTimeZone = new DateTimeZone("Europe/London");
		$date = new DateTime();
		$date->setTimezone($objTimeZone);
		
		$datos = array(
			'id_usuario' => $id_usuario,
			'id_caso' => $id_caso,
			'texto_mensaje' => $texto_mensaje,
			'fecha_creacion' => $date->format('Y-m-d H:i:s'),
			'es_mensaje_archivo' => 'F'
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_mensaje', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        // Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
    }
	
	public function insertar_mensaje_archivo($id_usuario, $id_caso, $nombre_original, $nombre_encriptado)
	{
		date_default_timezone_set("Europe/London");
		
		$objTimeZone = new DateTimeZone("Europe/London");
		$date = new DateTime();
		$date->setTimezone($objTimeZone);
		
		$datos = array(
			'id_usuario' => $id_usuario,
			'id_caso' => $id_caso,
			'fecha_creacion' => $date->format('Y-m-d H:i:s'),
			'es_mensaje_archivo' => 'V',
			'nombre_archivo_original' => $nombre_original,
			'nombre_archivo_encriptado' => $nombre_encriptado
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_mensaje', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        // Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
	}
	
	public function obtener_mensaje_porcaso($id_caso)
	{
		$this->db->select('*');
        $this->db->from('tbl_mensaje');
		$this->db->where('id_caso', $id_caso);
		$this->db->join('tbl_usuario', 'tbl_mensaje.id_usuario = tbl_usuario.id_usuario');
		$this->db->order_by('tbl_mensaje.fecha_creacion', 'ASC');
		$query = $this->db->get()->result_array();
		
		return $query;
	}
}