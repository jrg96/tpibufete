<?php
class MensajeGeneral_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_mensaje_general($id_usuario, $id_chat_general, $texto_mensaje)
    {
		date_default_timezone_set("Europe/London");
		
		$objTimeZone = new DateTimeZone("Europe/London");
		$date = new DateTime();
		$date->setTimezone($objTimeZone);
		
		$datos = array(
			'id_usuario' => $id_usuario,
			'id_chat_general' => $id_chat_general,
			'texto_mensaje' => $texto_mensaje,
			'fecha_creacion' => $date->format('Y-m-d H:i:s')
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_mensaje_general', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        // Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
    }
	
	public function obtener_mensaje_general($id_chat_general)
	{
		$this->db->select('*');
        $this->db->from('tbl_mensaje_general');
		$this->db->where('id_chat_general', $id_chat_general);
		$this->db->join('tbl_usuario', 'tbl_mensaje_general.id_usuario = tbl_usuario.id_usuario');
		$this->db->order_by('tbl_mensaje_general.fecha_creacion', 'ASC');
		$query = $this->db->get()->result_array();
		
		return $query;
	}
}